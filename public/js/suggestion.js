
function showSuggestions(currentElement, url, callback = null, ...callbackArgs) {
    let listId = "auto-list-suggestion";
    let ulELement = currentElement.parentElement.querySelector('#' + listId);
    if (ulELement != null) {
        ulELement.remove();
    }
    promiseJax(url, { term: currentElement.value.trim().toLowerCase() }, "POST", true, true).then((response) => {
        console.log(response);
        let suggestions = response.suggestions;
        if (suggestions.length != 0) {

            let ul = document.createElement("ul");
            ul.classList.add("list");
            ul.id = listId;
            suggestions.forEach(suggestion => {
                let li = document.createElement("li");
                li.classList.add("list-items");
                let word = "<b>" + suggestion.name.substr(0, currentElement.value.length) + "</b>";
                word += suggestion.name.substr(currentElement.value.length);
                li.innerHTML = word;
                li.addEventListener("click", e => {
                    currentElement.value = li.innerText;
                    if (typeof callback == "function")
                        callback(...callbackArgs);
                    ul.remove();
                });

                ul.appendChild(li);
            });
            currentElement.parentElement.appendChild(ul);
            currentElement.addEventListener("blur", e => {
                setTimeout(() => {
                    ul.remove();
                }, 100);

            });


        }

    });

}
