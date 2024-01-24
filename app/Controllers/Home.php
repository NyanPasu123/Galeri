<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\P;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('id')>0){

        $putus= new P();
        $data['pacaran'] = $putus->bebas('user');

        $data['page']= 'sales';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
     public function customer()
    {
        if (session()->get('id')>0){
        $putus= new P();
        $data['pacaran'] = $putus->bebas('customer');
        $data['page']= 'customer';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
     public function karyawan()
    {
        if (session()->get('id')>0){
        $putus= new P();
        $data['pacaran'] = $putus->bebas('karyawan');
        $data['page']= 'karyawan';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
    public function hr()
    {
        if (session()->get('id')>0){
        $putus= new P();
        $data['pacaran'] = $putus->bebas('hr');
        $data['page']= 'hr';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
     public function hrfinance()
    {
        if (session()->get('id')>0){
         $putus= new P();
        $data['pacaran'] = $putus->bebas('hrfinance');
        $data['page']= 'hrfinance';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
     public function barang()
    {
        if (session()->get('id')>0){
        $putus= new P();
        $data['pacaran'] = $putus->bebas('barang');
        $data['page']= 'barang';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
     public function form_karyawan()
    {
        if (session()->get('id')>0){
        $data['page']= 'form_karyawan';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
    public function form_customer()
    {
        if (session()->get('id')>0){
        $data['page']= 'form_customer';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
    public function form_hr()
    {
        if (session()->get('id')>0){
        $data['page']= 'form_hr';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
 public function form_hrfinance()
    {
        if (session()->get('id')>0){
        $data['page']= 'form_hrfinance';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
 public function form_barang()
    {
        if (session()->get('id')>0){
        $data['page']= 'form_barang';
        return view('index', $data);
        }else{
            return redirect()->to('home/login');
        }
    }
    public function login()
    {
     if (session()->get('id')>0){
        return redirect()->to('home');
     }else{
        return view('login');
      }
}        
    
    public function aksi_login()
    {
     $velix=$this->request->getPost('ceca');
     $ikbal=$this->request->getPost('p');

     $where=array(
            'username'=>$velix,
            'password'=>md5($ikbal)
     );
        $walawe = new P();
        $cek=$walawe->getWhere('user', $where);


        if ($cek > 0) {
            session()->set('id', $cek->id_user);
            session()->set('level', $cek->level);
            session()->set('u', $cek->username);
            return redirect()->to('home');

        }else{
            return redirect()->to('home/login');
        }
    }
    public function logout()
    {
     session()->destroy();
     return redirect()->to('home/login');
    }
}
