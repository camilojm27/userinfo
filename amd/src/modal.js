export const init = () => {

    require(["jquery", "core/modal_factory", 'core/modal_events', 'core/ajax', 'core/notification'],
        function($, ModalFactory, ModalEvents, ajax, notification) {
            let trigger = $('#create-modal');

            ModalFactory.create({
                type: ModalFactory.types.SAVE_CANCEL,
                title: "Información sobre usuarios", // Your modal title.
                body: '<form>\n' +
                    '    <label>Ingresa el nombre del usuario\n' +
                    '        <input id="username-input" name="user" type="text">\n' +
                    '    </label>\n' +
                    '</form>',
            }, trigger)
                .done(function(modal) {

                    modal.getRoot().on(ModalEvents.save, function(e) {
                        e.preventDefault();
                        // Console.log(Object.values(modal.getRoot()));
                        let usernameid = [];
                        usernameid.push(document.getElementById('username-input').value.toString());


                        let promises = ajax.call([{
                            methodname: 'core_user_get_users_by_field',
                            args: {field: 'username', values: usernameid}
                        }]);
                        promises[0].done(function(data) {

                            // Console.log(data[0]);
                            createPerson(data[0]);
                        }).fail(
                            function(e) {
                                notification.exception(e);
                            }
                        );
                    }).fail(notification.exception);


                });
        });


};

// eslint-disable-next-line valid-jsdoc,require-jsdoc
function createPerson(data) {

    let userRow = document.getElementById("user-row");
    let newPerson = [];
    const {lastaccess, country, username, lastname, firstname, email, suspended, firstaccess, city} = data;


    const newPersonAttribute = [username, firstname, lastname, email,
        `${country} - ${city}`, new Date(firstaccess * 1000), new Date(lastaccess * 1000), suspended];

    while (userRow.firstChild) {
        userRow.removeChild(userRow.firstChild);
    }

    /* If (userRow.firstChild) {
        userRow.parentElement.appendChild(document.createElement('tr'));
    }*/

    for (let i = 0; i < newPersonAttribute.length; i++) {
        newPerson[i] = document.createElement('td');
        newPerson[i].innerHTML = newPersonAttribute[i];
    }


    newPerson.forEach(x => userRow.appendChild(x));
}
