<form action="{{url('kirim data')}}" method="post">
    @if ($errors->any9())
    <input type="text" name="nama_txt"><br>
    <input type="text" name="jurusan_txt"><br>
    <input type="submit" value="kirim">
