let selector = document.getElementById('executors__selector');

console.log('selector', selector)

$(document).ready(function () {
    $('#executors__selector').on('change', function () {
        let selectedValues = $(this).val();
        console.log(selectedValues);
        let url = '/executors/search'
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/executors/search',
            type: 'post',
            data: {
                subjects: selectedValues,
            },
            success: function (response) {
                $('#executors-container').html(response);
            }
        })
    });
});
