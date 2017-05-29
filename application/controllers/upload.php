<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('model_image');
    $this->load->library('upload');
  }

  function index(){
    $data['image'] = $this->model_image->select();
    $data['total'] = $this->model_image->count_row();
    $data['error'] = $this->upload->display_errors();

    $this->load->view('header');
    $this->load->view('image_form', $data);
    $this->load->view('modal');
    $this->load->view('footer');
  }

  function configImage(){
    $nmfile = "img_".time();
    $config['upload_path'] = "./assets/uploads/";
    $config['allowed_types'] = "gif|jpg|jpeg|png"; 
    $config['max_size'] = "3000";
    $config['max_width'] = "5000";
    $config['max_height'] = "5000";
    $config['width'] = 100;
    $config['height'] = 100;
    $config['file_name'] = $nmfile;
   
    $this->upload->initialize($config);
  }

  /*function insertImage(){
    $this->configImage();
    //$this->configImageResize();
   
    if(!$this->upload->do_upload('gambar'))
    {
       $this->index();
    } else {
       $fileinfo = $this->upload->data();

       $data = array(
         'nm_img' => $this->input->post('nama'),
         'ket_img' => $this->input->post('keterangan'),
         'path_img' => $fileinfo['file_name']);

         $this->model_image->insert($data);
         redirect('upload?stat=sukses', 'refresh');
     }
  }*/

      public function insertImage(){
        $nmfile = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
                $gbr = $this->upload->data();
                $data = array(
               'nm_img' => $this->input->post('nama'),
               'ket_img' => $this->input->post('keterangan'),
               'path_img' => $gbr['file_name']);

                 $this->model_image->insert($data);//akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/uploads/hasil_resize/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('upload?stat=sukses', 'refresh'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('upload'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }



  /* function editImage()
   {
     $id = $this->input->post('id');
     $img_path = $this->input->post('path');

     $this->configImage();

   if (!$this->upload->do_upload('gambar')) {
     $data = array (
     'ket_img' => $this->input->post('keterangan'),
     'nm_img' => $this->input->post('nama'));
   } else {

     $fileinfo = $this->upload->data();

     $data = array (
     'nm_img' => $this->input->post('nama'),
     'ket_img' => $this->input->post('keterangan'),
     'path_img' => $fileinfo['file_name']);

     @unlink("./assets/uploads/". $img_path);
     @unlink("./assets/uploads/hasil_resize/". $img_path);
   }
   
     $this->model_image->update($data, $id);
     redirect('upload', 'refresh');
   }*/


   function editImage(){
     $id = $this->input->post('id');
     $img_path = $this->input->post('path');

        $nmfile = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);

      if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
               $fileinfo = $this->upload->data();

                   $data = array (
                   'nm_img' => $this->input->post('nama'),
                   'ket_img' => $this->input->post('keterangan'),
                   'path_img' => $fileinfo['file_name']);

                   @unlink("./assets/uploads/". $img_path);
                   @unlink("./assets/uploads/hasil_resize/". $img_path);
                   
                 //$this->model_image->insert($data);//akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/uploads/hasil_resize/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                $this->model_image->update($data, $id);//setelah di resize, maka langsung masuk ke database

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
                }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('upload', 'refresh');//jika berhasil maka akan ditampilkan view upload
            }else{
                   
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('upload'); //jika gagal maka akan ditampilkan form upload
            }

   }
 }

   function deleteImage()
   {
     $id = $this->input->post('id');
     $img_path = $this->input->post('path');

     unlink("./assets/uploads/". $img_path);
     unlink("./assets/uploads/hasil_resize". $img_path);

     $this->model_image->delete($id);
     redirect('upload', 'refresh');
   }
}