<x-app-layout>

    <form action="/artikel" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name="judul">
        <input type="file" name="gambar"/>
        <textarea name="isi"></textarea>
        <button type="submit">Submit</button>


</form>

</x-app-layout>