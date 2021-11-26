(function() {
    let httpRequest;
    let element = document.getElementById('last-updated-days');
    element.addEventListener('change', makeRequest);

    /**
     * @param {HTMLElementEventMap[string]} event
     */
    function makeRequest(event)
    {
        httpRequest = new XMLHttpRequest();

        if (!httpRequest) {
            alert('Abandon :( Impossible de créer une instance de XMLHTTP');
            return false;
        }
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('POST', '/');
        httpRequest.setRequestHeader(
            'Content-type',
            'application/x-www-form-urlencoded',
        );
        httpRequest.setRequestHeader(
            'X-CSRF-TOKEN',
            document.head.querySelector('[name="csrf-token"]').content,
        );
        httpRequest.send(`days=${event.target.value}`);
    }

    function alertContents()
    {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                alert(httpRequest.responseText);
            }
            else {
                alert('Il y a eu un problème avec la requête.');
            }
        }
    }
})();
