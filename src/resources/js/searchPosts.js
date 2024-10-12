let selector = document.getElementById('posts__selector');

console.log('selector', selector);

$(document).ready(function () {
    $('#posts__selector').on('change', function () {
        let selectedValues = $(this).val();
        console.log('asdas', selectedValues);
        let url = '/posts/search'
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/posts/search',
            type: 'post',
            data: {
                subjects: selectedValues,
            },
            success: function (response) {
                console.log('228', response);
                $('#posts-container').html(response);
            }
        })
    });
});
