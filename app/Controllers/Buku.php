<?php
// File: app/Controllers/Buku.php
namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BukuModel();
        helper('text'); // jika pakai character_limiter
    }
    public function dashboard()
    {
        if (!session()->get('user')) return redirect()->to('/auth/login');

        $model = new BukuModel();
        $data['total_buku'] = $model->countAll();
        $data['penulis_unik'] = count($model->distinct()->select('penulis')->findAll());
        $data['jumlah_karakter'] = array_sum(array_map(fn($b) => strlen(strip_tags($b['deskripsi'])), $model->findAll()));
        $data['recent_buku'] = $model->orderBy('id', 'DESC')->findAll(5);

        return view('buku/dashboard', $data);
    }


    public function index()
    {
        helper('text'); // ← tambahkan ini

        $keyword = $this->request->getGet('search');
        if ($keyword) {
            $this->model->like('judul', $keyword)->orLike('penulis', $keyword);
        }

        $data['buku'] = $this->model->paginate(6, 'buku');
        $data['pager'] = $this->model->pager;
        return view('buku/home', $data);
    }


    public function detail($id)
    {
        $buku = $this->model->find($id);
        if (!$buku) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Buku dengan ID $id tidak ditemukan");
        }
        return view('buku/detail', ['buku' => $buku]);
    }

    public function create()
    {
        return view('buku/form', ['mode' => 'create']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Handle cover
        $cover = $this->request->getFile('cover');
        if ($cover && $cover->isValid() && !$cover->hasMoved()) {
            $coverName = $cover->getRandomName();
            $cover->move('uploads/covers', $coverName);
            $data['cover'] = $coverName;
        }

        // Handle PDF
        $pdf = $this->request->getFile('file_pdf');
        if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {
            $pdfName = $pdf->getRandomName();
            $pdf->move('uploads/pdfs', $pdfName);
            $data['file_pdf'] = $pdfName;
        }

        $this->model->save($data);
        return redirect()->to('/buku/dashboard');
    }



    public function edit($id)
    {
        return view('buku/form', ['mode' => 'edit', 'buku' => $this->model->find($id)]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $data['id'] = $id;

        // cover
        $cover = $this->request->getFile('cover');
        if ($cover && $cover->isValid() && !$cover->hasMoved()) {
            $coverName = $cover->getRandomName();
            $cover->move('uploads/covers', $coverName);
            $data['cover'] = $coverName;
        }

        // pdf
        $pdf = $this->request->getFile('file_pdf');
        if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {
            $pdfName = $pdf->getRandomName();
            $pdf->move('uploads/pdfs', $pdfName);
            $data['file_pdf'] = $pdfName;
        }

        $this->model->save($data);
        return redirect()->to('/buku/dashboard');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/buku');
    }
}
