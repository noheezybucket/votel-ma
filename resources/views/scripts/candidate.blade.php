@section('scripts')
    <script>
        const loadTable = (data) => {
            var rows = []
            data.forEach(elt => {
                console.log(elt)
                rows.push({
                    id: elt.id,
                    nom: elt.nom,
                    prenom: elt.prenom,
                    photo: elt.photo != 'mike' ? '<img src="/img/' + elt.photo +
                        '.jpg" alt="" width="80px" class="rounded">' :
                        '<div class="bg-primary rounded text-white py-4"><h1 class="text-center">?</h1> </div>',
                    biographie: elt.biographie.substring(0, 150) + '...',
                    partie: elt.partie,
                    buttons: `
                    <div class="d-flex gap-2">

                    <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#viewModal" ><x-far-eye style="width:20px" /></button>

                    <button type="button" class="btn btn-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#viewModal" ><x-far-pen-to-square style="width:20px" class='text-white'/></button>
                    
                    <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#viewModal" ><x-far-trash-can style="width:20px" /></button>
                    </div>
                    `
                })
            });
            $("#candidate-table").bootstrapTable('load', rows)
        }

        // get candidates
        const getCandidates = () => {
            $.ajax({
                url: "{{ route('candidate.index') }}",
                method: "GET",
                timeout: 5000,
                // headers: {
                //     Authorization: "Bearer " + token,
                // }
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
        getCandidates()
    </script>

    <script></script>
@endsection
