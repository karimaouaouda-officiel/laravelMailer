<x-auth>
    <div class="conteiner-fluid position-relative" style="min-height: 91.5vh;">
        <div class="tools toolsHidden position-absolute bg-light border" style="top:50px;left:0px;z-index:9999;">
            <x-workspace.tools/>
            <div class="after cursor-pointer hide position-absolute bg-primary">
                <i class="fas fa-arrow-left text-light text-center w-100 h-100 h5" style="pointer-events: none;"></i>
            </div>
        </div>
        <div class="w-100 p-2 mt-3" style="min-height: 90vh;padding-left:50px">
            <div class="bg-light container" id="workspace">
                <x-workspace.upload/>
            </div>
        </div>
    </div>



    <script>
        $(function(){
            $('.tools .after').click(function(){
                $(this).toggleClass('hide');
                $('.tools').toggleClass('toolsHidden');
            })
        })
    </script>

</x-auth>