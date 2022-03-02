document.querySelectorAll('.wrapper').forEach(el => {
    el.addEventListener('click', e => {
        if(e.target.classList.contains('toggle')) el.querySelector('.content').classList.toggle('toggled');
    });
})


