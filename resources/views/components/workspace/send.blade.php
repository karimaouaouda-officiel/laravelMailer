<div class="w-100">
    <h3 class="text-center h2 text-primary py-3 fw-bold" style="letter-spacing: 1.5px;">
        Send emails
    </h3>
</div>
<div class="w-100 p-2">
    <div class="w-100">
        <div class="form-control">
            <select class="form-select my-2" id="fileSelect" aria-label="Default select example">
                <option selected disabled>select file</option>
                @foreach($user->files as $file)
                <option value="{{$file->id}}"> {{$file->name}} </option>
                @endforeach
            </select>

            <div class="my-3">
                <label for="content" class="form-label">file content</label>
                <textarea class="form-control" id="content" rows="7" disabled></textarea>
            </div>
        </div>
    </div>
</div>



<script>
    $(function(){
        $('#fileSelect').change(function(){
            let file = $(this).val()
            fetch(`/getFileContent?file=${file}` , {method:"GET"})
            .then(res =>res.text())
            .then(text => {
                $("#content").val(text);
            })
        })
    })
</script>