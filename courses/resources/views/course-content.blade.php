@include('style')
<body>
    <h1>{{$courseInfo->NAME}}</h1>
    <form action="/add-file" method="POST" enctype="multipart/form-data">
        <h5>Subir PDF</h5>
        <input type="hidden" name="id" value="{{$courseInfo->id}}">
        @csrf
        <input type="file" name="file-input">
        <input type="submit" name="inputpdf" id="" value="Subir">
    </form>
    @foreach ($files as $f)
        <object data="{{asset ('storage/files/'. $f->FILE_NAME)}}" type="" width="800" height="500"></object>
        <br><br><br>
    @endforeach
        <form action="/add-video" method="POST">
            <h5>Subir video</h5>
            <input type="hidden" name="id" value="{{$courseInfo->id}}">
            <input type="text" name="videoinput">
            <input type="submit" value="Enviar">
            @csrf
        </form>
    @foreach ($videos as $video)
        <iframe src="{{$video->VIDEO}}" frameborder="0" width="600" height="600" allowfullscreen></iframe>
        <br><br><br>
    @endforeach
</body>