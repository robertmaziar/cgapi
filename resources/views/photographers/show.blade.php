@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Photographer Profile</h1>
    <div id="photographer"></div>
    <div id="album"></div>
    <script>
        $(function() {
            var id = {!! json_encode($id) !!};
            $.ajax({
                url: '/api/photographers/getPhotographer/' + id,
                type: 'GET',
                complete: function(data) {
                    data = data.responseJSON;
                    if (data != null && data.id > 0) {
                        $('#photographer').append(BuildProfile(data));
                        $('#album').append(BuildAlbum(data));
                        $('.is-featured-1').append('<i class="fa fa-heart"></i>');
                    }
                    else {
                        var output =
                        '<div class="alert alert-danger"><b>Oops!</b> No photographer was found.</div>'
                        $('#photographer').append(output);
                    }
                }
            });
        });

        function BuildProfile(data) {
            var output =
            '<div class="card mb-3">' +
                '<h3 class="card-header">' + data.name + '</h3>' +
                '<div class="card-body">' +
                    '<div class="row">' +
                        '<div class="col-3">' +
                        '<img class="w-100 rounded-circle" src="/'+ data.profile_picture +'" />' +
                        '</div>' +
                        '<div class="col-6">' +
                            '<h5 class="card-title">Bio</h5>' +
                            '<h6 class="card-subtitle text-muted">' + data.bio + '</h6>' +
                        '</div>' +
                        '<div class="col-3">' +
                            '<h6 class="card-subtitle text-muted">Phone</h6>' +
                            '<a href="#" class="card-link mb-3 d-block">' + data.phone + '</a>' +
                            '<h6 class="card-subtitle text-muted">Email</h6>' +
                            '<a href="#" class="card-link d-block">' + data.email + '</a>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';
            return output;
        }

        function BuildAlbum(data) {
            var output = '<div class="row">';
            $.each(data.album.data, function (index, values) {
                output +=
                    '<div class="col-lg-4 col-12 mb-3">' +
                        '<div class="card">' +
                            '<h5 class="card-header">' + values.title + ' </h5>' +
                            '<img src="/' + values.img + '" />' +
                            '<div class="card-body">' +
                                '<small>' + values.description + ' </small>' +
                                '<br style="clear:both;" />' +
                                '<small class="float-right text-muted">' + values.date + ' </small>' +
                                '<span class="float-left text-danger is-featured-' + values.featured + '"></span>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
            });
            return output += '</div>';
        }
    </script>
@endsection
