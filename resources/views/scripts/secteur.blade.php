@section('scripts')
    <script>
        const loadTable = (data) => {
            let rows = []

            data.forEach(elt => {
                rows.push({
                    id: elt.id,
                    label: elt.label,
                    couleur: `<div class='bg-${elt.couleur} py-3 rounded'></div>`,
                    icon: elt.icon,
                    buttons: `
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-outline-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id='${JSON.stringify(elt.id)}' ><x-far-trash-can style="width:20px" /></button>
                        </div>
                        `
                });
            })
            // <button type="button" class="btn btn-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#update" data-bs-secteur='${JSON.stringify(elt)}'><x-far-pen-to-square style="width:20px" class='text-white'/></button>

            $("#secteur-table").bootstrapTable('load', rows)
        }

        // list secteur
        const getSecteurs = () => {
            $.ajax({
                url: "{{ route('secteur.list') }}",
                method: "GET",
                timeout: 5000
            }).then(response => {
                loadTable(response.secteurs)
            }).catch(error => console.log(error))
        }

        // create
        const createSecteur = () => {
            $('#create-secteur-btn').prop('disabled', true)
            $('#create-secteur-btn').html(
                '<div class="spinner-border spinner-border-sm" role="status"></div>')

            let data = {
                label: $("#label option:selected").text(),
                couleur: $("#couleur option:selected").text(),
                // icon: $("#icon").val(),
            };

            console.log(data)

            $.ajax({
                url: "{{ route('secteur.create') }}",
                method: "POST",
                data: data,
                timeout: 5000
            }).then(response => {
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

                $('#create-secteur-btn').prop('disabled', false)
                $('#create-secteur-btn').html(
                    'Créer le secteur <x-fas-plus style="width:20px" />')
            }).catch(error => {
                console.log(error)
                if (error.status === 500) {
                    $("#error").html(
                        '<span  class="alert alert-danger d-block">Vous ne pouvez pas utiliser la même couleur/label deux fois</span>'
                    );
                }
                $('#create-secteur-btn').prop('disabled', false)
                $('#create-secteur-btn').html(
                    'Créer le secteur <x-fas-plus style="width:20px" />')

            })
        }

        // delete
        const deleteSecteur = () => {
            $('#delete-secteur-btn').prop('disabled', true)
            $('#delete-secteur-btn').html(
                '<div class="spinner-border spinner-border-sm" role="status"></div>')

            const delete_id = $("#delete-id").val();

            console.log(delete_id)

            $.ajax({
                url: "http://127.0.0.1:8000/api/secteur/delete/" + delete_id,
                method: "DELETE",
                timeout: 5000
            }).then(response => {
                console.log(response)
                getSecteurs()
                $("#delete").modal('hide')
                $("#delete-secteur-btn").prop("disabled", false)
                $("#delete-secteur-btn").html('Oui')
            }).catch(error => {
                console.log(error)
                $("#delete-secteur-btn").prop("disabled", false)
                $("#delete-secteur-btn").html('Oui')
            })
        }
    </script>

    <script>
        if (window.location.href === "{{ route('admin.list-secteurs') }}") {
            getSecteurs()

            $("#delete").on('show.bs.modal', event => {
                var button = event.relatedTarget;
                var secteur_id = JSON.parse(button.getAttribute('data-bs-id'));
                console.log(secteur_id)
                $("#delete-id").val(secteur_id)

            })

            $("#delete-secteur-btn").click(deleteSecteur)
        }
        if (window.location.href === "{{ route('admin.create-secteur') }}") {
            $("#create-secteur-btn").click(createSecteur)
        }
    </script>
@endsection
