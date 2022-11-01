<div class="w-100 border-bottom py-2" style="display: grid;grid-template-columns:41px auto">
    <i class="fas fa-tools text-center h3" style="width:40px;height:40px;line-height:40px"></i>
    <h3 class="h3 w-100 text-center overflow-hidden" style="letter-spacing: 2px;">
        Tools
    </h3>
</div>

<div class="tools-inner py-2 overflow-hidden">
    <ul class="nav flex-column">
        <li class="nav-item py-1 cursor-pointer" data-tool="upload">
            <i class="fas fa-upload border-end text-center h5" style="width: 40px;height:40px;line-height:40px"></i>
            <span class="h5 fw-light" style="letter-spacing: 1.5px;">
                upload new file
            </span>
        </li>
        <li class="nav-item py-1 cursor-pointer" data-tool="view">
            <i class="fas fa-eye border-end text-center h5" style="width: 40px;height:40px;line-height:40px"></i>
            <span class="h5 fw-light" style="letter-spacing: 1.5px;">
                view files
            </span>
        </li>
        <li class="nav-item py-1 cursor-pointer" data-tool="send">
            <i class="fas fa-paper-plane border-end text-center h5" style="width: 40px;height:40px;line-height:40px"></i>
            <span class="h5 fw-light" style="letter-spacing: 1.5px;">
                send emails
            </span>
        </li>
        <li class="nav-item py-1 cursor-pointer" data-tool="settings">
            <i class="fas fa-cog border-end text-center h5" style="width: 40px;height:40px;line-height:40px"></i>
            <span class="h5 fw-light" style="letter-spacing: 1.5px;">
                upload new file
            </span>
        </li>
    </ul>
</div>

<script>
    localStorage.setItem('page' , "upload")
    $('.tools li').click(function(){
        if(localStorage.getItem('page') == $(this).attr('data-tool')){
            alert("no")
            return
        }
        
        let page = $(this).attr('data-tool');

        localStorage.setItem('page' , page)

        let url = "{{route('getTool')}}"

        fetch(`${url}?page=${page}` , {method:'GET'})
        .then(response => response.text())
        .then(text => {
            console.log(text)
            $('#workspace').html(text)
        })
    })
</script>