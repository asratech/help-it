## help-it
Merupakan aplikasi web berbasis codeigniter untuk keperluan manajemen pekerjaan (work order) khususnya bidang IT

### Getting Started

Masih versi awal, digunakan agar antar team/karyawan, bisa saling mengetahui pekerjaan bar apa yang diinginkan oleh departemen lain (atau bisa departemen sendiri). Kemudian melihat juga pekerjaan yang sementara dikerjakan (atau on progress). Cukup membantulah, dibanding harus menulis-nulis di whiteboard. 

![Screenshot](_build/preview.png)

### Prerequisites

Cuma butuh komputer :D

```
Apache/Ngix Server
PHP
MySQL
```

### Installing

Edit file database.php, sesuaikan dengan kondisi komputer/server Anda.


```
'hostname' => 'localhost',
'username' => 'root',
'password' => 'root',
'database' => 'help-it',
```

Buat database help-it, kemudian import database 

```
help-it.sql
```

  
### Dibuat Menggunakan

* [CodeIgniter](https://codeigniter.com/) - Framework v3.1.7
* [AdminLTE](https://adminlte.io/) - Control Panel Template


### Authors

* **Mardino Santosa** - [zdienos](https://github.com/zdienos)

