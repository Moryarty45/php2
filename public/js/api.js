let buttonsBuy = document.querySelectorAll('.buy');
buttonsBuy.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/basket/AddToBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                    })
                });
                const answer = await response.json();
                //console.log(answer);
                document.getElementById('count').innerText = answer.count;
                //console.log(answer.id);
            }
        )();
    })
});

let buttonsDel = document.querySelectorAll('.delete');

buttonsDel.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        console.log(id);
        (
            async () => {
                const response = await fetch('/basket/DeleteToBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                    })
                });
                const answer = await response.json();
                //console.log(answer);
                elem.parentElement.remove();
                document.getElementById('count').innerText = answer.count;
                //console.log(answer);
            }
        )();
    })
});
