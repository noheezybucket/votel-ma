@section('scripts')
    <script>
        const loadTable = (data) => {
            let rows = [];
            data.forEach(elt => {
                rows.push({
                    id: elt.id,
                    titre: elt.titre,
                    contenu: elt.contenu,
                    document: elt.document,
                    buttons: `
                    <div class="d-flex gap-2">

                    <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#view" data-bs-program='${JSON.stringify(elt)}'><x-far-eye style="width:20px" /></button>

                    <button type="button" class="btn btn-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#update" data-bs-program='${JSON.stringify(elt)}'><x-far-pen-to-square style="width:20px" class='text-white'/></button>
                    
                    <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id='${JSON.stringify(elt.id)}' ><x-far-trash-can style="width:20px" /></button>
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

                loadTable(programs)

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
            console.log(formData)

            $.ajax({
                url: "{{ route('program.create') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                timeout: 5000
            }).then((res) => {
                console.log(res)
                $('#create-program-btn').prop('disabled', false)
                $('#create-program-btn').html(
                    'Créer le programme')
            }).catch((error) => {
                conole.log(error)
            })
        }
    </script>

    <script>
        if (window.location.href === "{{ route('admin.list-programs') }}") {
            getPrograms()

            $("#view").on('show.bs.modal', event => {
                var button = event.relatedTarget;
                var program = JSON.parse(button.getAttribute('data-bs-program'));
                console.log(program)

                $("#titre").val(program.titre);
                $("#contenu").val(program.contenu);
                $("#document").val(program.document);
            })

        }
    </script>
@endsection
