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
                    255
                </td>
                <td>
                    <button class="btn btn-primary" data-desc="{{$file->description}}">
                        description
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger" id="{{$file->id}}">
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