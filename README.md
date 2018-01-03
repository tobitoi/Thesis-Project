# Thesis-Project

Mengatasi Error PHP

Walaupun PHP adalah bahasa yang cukup mudah dipelajari,namun ternyata masih banyak yang belum paham benar dengan konsep error dan bagaimana cara mengatasinya. Error yang saya bahas disini lebihfokus pada eror karena perbedaan konfigurasi antara satu server dengan server yang lain, atau antara satu komputer dengan komputer yang lain. Contoh kasusnya, anda mendownload source code dari website ini. Namun saat dijalankan di komputer anda, terdapat error, notice,warning atau malah blank tidak muncul output sama sekali. Sekali lagi, error seperti ini adalah error karena konfigurasi komputer saya berbeda dengan komputer anda.

OK, langsung masuk ke topik. Error yang saya bahas hanya ada dua yaitu 1) error karena short_open_tag OFF dan error karena masalah error_reporting.

short_open_tag
Jika anda pemakai windows, biasanya servernya menggunakan XAMPP.XAMPP di beberapa versi mematikan short open tag sehingga skrip yang anda downloa dari website ini atau website lain yang menggunakanStyle coding model pendek tidak akan bisa berjalan. Ciri ciri dari short_open_tag Off adalah halaman php tidak dieksekusi sama sekali dan jika anda buka “View Source” di browser, maka script php akan keliahatan. Ciri yang lain adanya muncul error dengan pesan unexpected $end padahal sudah jelas bahwa block kode sudah diberi kurung tutup. contoh error tampak seperti dibawah ini.

Parse error: syntax error, unexpected $end in C:\xampp\htdocs\php2013\bab4\kampus\kampus_view.php
ini biasanya terjadi jika menggunakan gaya coding campuran. Agar hal ini tidak terjadi, aktifkan short_open_tag menjadi on.
Untuk mengaktifkannya, edit file  C:\XAMMP\php.php.ini Edit baris

short_open_tag = Off
ubah menjadi

short_open_tag = On
seting ini ada dibaris nomor 220-an. habis itu, restart apache atau restart komputer anda.

Error Reporting
Error Reporting adalah aturan menampilkan error dihalaman web. Eror di PHP punya beberapa tingkatan diantaranya Notice , Deprecated, Warning dan error yang sebenarnya. Eror selain error dalam artian ada kesalahan program sebenarnya bisa dihilangkan hanya dengan mengganti konfigurasi error reportingnya. Jika di PHP.ini XAMPP, ada dibaris 500-an.

ganti baris

error_reporting = E_ALL & ~E_NOTICE
menjadi

error_reporting =E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR
Penjelasan sederhana dari konfigurasi diatas adalah:” Tampilkan pesan error jika dan hanya jika Program mengalami kesalahan di codenya yang membuat program tidak berfungsi sebagamana mestinya”.

Setelah itu, save lalu restart apache.

Tips ini berlaku bukan hanya untuk XAMPP,tapi juga WAMP, MAMP dan lainnya.

#config di folder inc
