@section('scripts')
    <script>
        const loadTable = (data) => {
            var rows = []
            data.forEach(elt => {
                rows.push({
                    id: elt.id,
                    nom: elt.nom,
                    prenom: elt.prenom,
                    photo: elt.photo != 'mike' ? '<img src="/img/' + elt.photo +
                        '.jpg" alt="" width="80px" class="rounded">' :
                        // '<img src="/img/default.png" alt="" width="150px" class="rounded">',
                        '<div class="bg-primary rounded text-white py-4 d-flex justify-content-center"><x-far-image style="width:50px"/></div>',
                    biographie: elt.biographie.substring(0, 150) + '...',
                    partie: elt.partie,
                    buttons: `
                    <div class="d-flex gap-2">

                    <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#view" data-bs-candidate='${JSON.stringify(elt)}'><x-far-eye style="width:20px" /></button>

                    <button type="button" class="btn btn-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#viewModal" ><x-far-pen-to-square style="width:20px" class='text-white'/></button>
                    
                    <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#viewModal" ><x-far-trash-can style="width:20px" /></button>
                    </div>
                    `
                })
            });
            $("#candidate-table").bootstrapTable('load', rows)
        }

        //create candidate
        const createCandidate = () => {
            $('#create-candidate-btn').prop('disabled', true)
            $('#create-candidate-btn').html(
                '<div class="spinner-border spinner-border-sm" role="status"></div>')

            let data = {
                nom: $("#nom").val(),
                prenom: $("#prenom").val(),
                partie: $("#partie").val(),
                biographie: $("#biographie").val(),
                validate: $('#validate').val()
            }

            $.ajax({
                url: "{{ route('candidate.create') }}",
                method: "POST",
                timeout: 5000,
                data: data
            }).then(response => {
                console.log(response)
                if (response.status === 'success') {
                    $("#success").html(
                        '<span  class="alert alert-success d-block">' + response.message + '</span>');
                } else if (response.status === 'error') {
                    const url =
                        "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=fr&dt=t&q=" +
                        encodeURI(response.message);
                    $.getJSON(url, function(data) {
                        $("#error").html(
                            '<span  class="alert alert-danger d-block">' + data[0][0][0] + '</span>'
                        );
                    });
                }
                $('#create-candidate-btn').prop('disabled', false)
                $('#create-candidate-btn').html(
                    'Créer le candidat <x-far-square-plus style="width:20px" />')
            }).catch(err => {
                console.log('no')
                $('#create-candidate-btn').prop('disabled', false)
                $('#create-candidate-btn').html(
                    'Créer le candidat <x-far-square-plus style="width:20px" />')

            })
        }

        // get candidates
        const getCandidates = () => {
            $.ajax({
                url: "{{ route('candidate.list') }}",
                method: "GET",
                timeout: 5000,
            }).then(response => {
                let candidates = [];

                response.candidates.forEach(candidate => {
                    candidates.push(candidate)
                })

                loadTable(candidates)
            }).catch(error => {
                console.log(error)

            })
        }


        // update candidate
        const updateCandidate = () => {
            console.log("yes")
        }
    </script>

    <script>
        if (window.location.href === "{{ route('admin.list-candidate') }}") {
            getCandidates()
            $("#view").on('shown.bs.modal', event => {
                var button = event.relatedTarget
                var candidate = JSON.parse(button.getAttribute('data-bs-candidate'))

                $("#prenom").val(candidate.prenom)
                $("#nom").val(candidate.nom)
                $("#biographie").val(candidate.biographie)
                if (candidate.nom != 'mike') {
                    $("#photo").attr('src', "/img/default.png")

                } else {
                    $("#photo").attr('src', "/img/" + candidate.nom + '.jpg')

                }

            })
        }
        if (window.location.href === "{{ route('admin.create-candidate') }}") {
            $('#create-candidate-btn').click(createCandidate)
        }
    </script>
@endsection
