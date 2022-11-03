<div class="w-100">
    <h3 class="text-center h2 text-primary py-3 fw-bold" style="letter-spacing: 1.5px;">
        Your files
    </h3>
</div>

<div class="w-100 p-2">
    <table class="table table-striped table-success">
        <tbody>
            <tr>
                <th>
                    file name
                </th>
                <th>
                    file size
                </th>
                <th>
                    description
                </th>
                <th>
                    actions
                </th>
            </tr>
            @foreach($user->files as $file)
            <tr>
                <td>
                    {{ $file->name }}
                </td>
                <td>
                    {{$file->size}} bytes
                </td>
                <td>
                    <button class="btn descToggler btn-primary" data-bs-toggle="modal" data-bs-target="#descModal" data-desc="{{$file->description}}">
                        description
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger remFile" id="{{$file->id}}">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="btn btn-secondary" id="$file->id">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="descModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    file description
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('.descToggler').click(function(){
        $('.modal-body').text($(this).attr('data-desc'))
    })
    $('.remFile').click(function() {
        let file = $(this).attr('id')
        let data = new FormData
        data.append("file", file)
        data.append('_token', "{{csrf_token()}}")

        fetch("/removeFile", {
                method: "POST",
                body: data
            })
            .then(response => response.json())
            .then(json => {
                alert(json.message)

                $(this).parent().parent().remove()
            })
    })
</script>