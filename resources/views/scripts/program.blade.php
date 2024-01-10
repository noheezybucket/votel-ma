@section('scripts')
    <script>
        const loadTable = (data) => {
            let rows = [];
            data.forEach(elt => {
                rows.push({
                    id: elt.id,
                    titre: elt.titre,
                    contenu: elt.contenu,
                    document: `<a href="{{ asset('uploads/documents/${elt.document}') }}" class='btn btn-primary'>Télécharger <x-fas-download style="width:20px" /></a>`,
                    buttons: `
                    <div class="d-flex justify-content-center gap-2">

                    <button type="button" class="btn btn-outline-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#view" data-bs-program='${JSON.stringify(elt)}'><x-far-eye style="width:20px" /></button>

                    <button type="button" class="btn btn-outline-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#update" data-bs-program='${JSON.stringify(elt)}'><x-far-pen-to-square style="width:20px"/></button>
                    
                    <button type="button" class="btn btn-outline-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id='${JSON.stringify(elt.id)}' ><x-far-trash-can style="width:20px" /></button>
                    </div>
                    `
                })
            });

            $("#program-table").bootstrapTable('load', rows);
        }

        // list programs
        const getPrograms = () => {
            $.ajax({
                url: "{{ route('program.list') }}",
                method: "GET",
                timeout: 5000
            }).then((res) => {
                let programs = []

                res.programs.forEach(program => {
                    programs.push(program)
                });
                console.log(programs)

                loadTable(res.programs)

            }).catch((error) => {
                console.log(error)
            })
        }


        // create program
        const createProgram = () => {
            $('#create-program-btn').prop('disabled', true)
            $('#create-program-btn').html(
                '<div class="spinner-border spinner-border-sm" role="status"></div>')

            const formData = new FormData($("#create-program")[0])

            $.ajax({
                url: "{{ route('program.create') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                timeout: 5000
            }).then((response) => {
                console.log(response)
                if (response.status === 'success') {
                    $("#error").html('');
                    $("#success").html(
                        '<span  class="alert alert-success alert-dismissible d-block">' + response.message +
                        '</span>');

                }

                if (response.status === 'error') {
                    const url =
                        "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=fr&dt=t&q=" +
                        encodeURI(response.message);

                    $("#success").html('');

                    $.getJSON(url, function(data) {
                        $("#error").html(
                            '<span  class="alert alert-danger d-block">' + data[0][0][0] + '</span>'
                        );
                    });
                }
                $('#create-program-btn').prop('disabled', false)
                $('#create-program-btn').html(
                    'Créer le programme <x-fas-plus style="width:20px" />')
            }).catch((error) => {
                console.log("no")
                $('#create-program-btn').prop('disabled', false)
                $('#create-program-btn').html(
                    'Créer le programme <x-fas-plus style="width:20px" />')
            })
        }

        // update program
        const updateProgram = () => {
            $("#update-program-btn").prop("disabled", true)
            $("#update-program-btn").html('<div class="spinner-border spinner-border-sm" role="status"></div>')

            const data = {
                titre: $("#update-titre").val(),
                contenu: $("#update-contenu").val(),
                // document: $("#update-document")[0].files[0],
            };

            const update_id = $("#update-id").val()


            $.ajax({
                url: "http://127.0.0.1:8000/api/program/update/" + update_id,
                method: "PUT",
                timeout: 5000,
                data: data,
            }).then(response => {
                console.log(data)
                console.log(response)

                $("#update-program-btn").prop("disabled", false)
                $("#update-program-btn").html('Sauvegarder')

                if (response.status === 'success') {
                    getPrograms()
                    $("#update").modal('hide')
                    $("#update-error").html("");
                    $("#update-success").html(
                        '<span  class="alert alert-success alert-dismissible d-block">' + response.message +
                        '</span>');
                }

                if (response.status === 'error') {
                    $("#update-success").html('');

                    const url =
                        "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=fr&dt=t&q=" +
                        encodeURI(response.message);

                    $.getJSON(url, function(data) {
                        $("#update-error").html(
                            '<span  class="alert alert-danger d-block">' + data[0][0][0] + '</span>'
                        );
                    });
                }
            }).catch(error => {
                console.log(error)
                $("#update-program-btn").prop("disabled", false)
                $("#update-program-btn").html('Sauvegarder')
            })
        }

        // delete program
        const deleteProgram = () => {
            $("#delete-program-btn").prop("disabled", true)
            $("#delete-program-btn").html('<div class="spinner-border spinner-border-sm" role="status"></div>')

            const delete_id = $("#delete-id").val()

            $.ajax({
                url: "http://127.0.0.1:8000/api/program/delete/" + delete_id,
                method: "DELETE",
                timeout: 5000
            }).then(response => {
                getPrograms()
                $("#delete").modal('hide')
                $("#delete-program-btn").prop("disabled", false)
                $("#delete-program-btn").html('Oui')
            }).catch(error => {
                console.log(error)
                $("#delete-program-btn").prop("disabled", false)
                $("#delete-program-btn").html('Oui')
            })
        }
    </script>

    <script>
        if (window.location.href === "{{ route('admin.list-programs') }}") {
            getPrograms()

            $("#view").on('show.bs.modal', event => {
                var button = event.relatedTarget;
                var program = JSON.parse(button.getAttribute('data-bs-program'));

                $("#titre").val(program.titre);
                $("#contenu").val(program.contenu);
                $("#document").html(
                    `<a href="{{ asset('uploads/documents/${program.document}') }}" class='btn btn-primary'>Télécharger le document <x-fas-download style="width:20px" /></a>`
                );
            })

            $("#update").on('show.bs.modal', event => {
                var button = event.relatedTarget;
                var program = JSON.parse(button.getAttribute('data-bs-program'))

                $("#update-id").val(program.id)
                $("#update-titre").val(program.titre);
                $("#update-contenu").val(program.contenu);
            })

            $("#delete").on('show.bs.modal', event => {
                var button = event.relatedTarget;
                var program_id = JSON.parse(button.getAttribute('data-bs-id'))

                $("#delete-id").val(program_id)
            })

            $("#delete-program-btn").click(deleteProgram)
            $("#update-program-btn").click(updateProgram)


        }

        if (window.location.href === "{{ route('admin.create-program') }}") {
            $("#create-program-btn").click(createProgram)
        }
    </script>
@endsection
