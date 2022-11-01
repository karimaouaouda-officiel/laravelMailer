<div class="w-100 border">
    <h3 class="w-100 text-center h2 fw-bold text-primary py-3" style="letter-spacing: 2px;">
        Upload your file
    </h3>
    <div class="form w-100">
        @if($errors->any())
            <ul class="w-100 text-danger px-5 text-center">
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif
        <form class="container my-3 g-3 needs-validation" action="{{route('newFile')}}" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="fileName" value="{{old('fileName')}}" class="form-control" id="fileName" placeholder="emailfile ( without .txt )" required>
                <label for="fileName">file name</label>
            </div>
            <div class="mb-3">
                <label for="fileDesc" class="form-label">file description</label>
                <textarea class="form-control" name="desc" id="fileDesc" placeholder="file description" rows="3" style="resize: none;"></textarea>
            </div>
            <div class="my-3 d-flex flex-column flex-sm-row justify-content-around w-100 align-items-center" style="min-height: 4rem;">
                <input type="file" class="d-none" name="file">
                <a href="void:javascript(0)" id="fileBtn" class="btn btn-primary">
                    <i class="fas fa-file mx-2"></i>
                    <span style="letter-spacing: 1.5px;">
                        chose file
                    </span>
                </a>

                <button type="submit" class="btn btn-warning border my-3 my-sm-0">
                    <i class="fas fa-upload"></i>
                    <span style="letter-spacing: 1.5px;">
                        upload
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    var fileBtn = $('#fileBtn');

    $(fileBtn).click(function(){
        $('input[type=file]').trigger('click')
    })
    $('input[type=file]').change(function(){
        alert($(this).val())
    })
</script>