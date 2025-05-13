function showInfo(areaId) {
    // Скрываем все блоки
    document.querySelectorAll('.area').forEach(area => {
        area.style.display = 'none';
    });

    // Показываем нужный блок
    document.getElementById(areaId).style.display = 'block';
}

// Заявки
$(document).ready(function () {
    $("form").on("submit", function (event) {
        event.preventDefault(); // Останавливаем стандартную отправку формы

        var form = $(this);
        var formData = form.serialize(); // Собираем данные формы

        $.ajax({
            type: "POST",
            url: form.attr("action"), // Берём URL из атрибута action
            data: formData,
            dataType: "json",
            success: function (response) {
                notifyBar(response.message, response.status);
                form.trigger("reset"); // Очищаем форму после успешной отправки
            },
            error: function () {
                notifyBar("Ошибка соединения с сервером", "error");
            }
        });
    });

    function notifyBar(message, type) {
        var alertClass = type === "success" ? "success" : "error";
        if (!$(".alert-box").length) {
            $('<div class="alert-box ' + alertClass + '">' + message + '</div>')
                .prependTo("body")
                .delay(2000)
                .fadeOut(1000, function () {
                    $(this).remove();
                });
        }
    }

    // Вывод карточек
    let lastIdPlayers = 0;
    let lastIdTeams = 0;
    let idGame = $('#id_game').val(); // Получаем ID игры со страницы

    function loadCards(type, lastId) {
        $.ajax({
            url: '../forms/fetch_cards.php',
            type: 'GET',
            data: { type: type, lastId: lastId, id_game: idGame }, // Передаем id_game
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.data.length > 0) {
                    let container = type === 'players' ? '#players-container' : '#teams-container';
                    response.data.forEach(item => {
                        let cardHtml = '';

                        if (type === 'players') {
                            cardHtml = `
                                <div class="universal-card">
                                    <div class="element"><div class="user_login">${item.login}</div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Имя</div><div class="player-name">${item.player_name}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Возраст</div><div class="player-age">${item.age}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Никнейм</div><div class="player-nickname">${item.nickname}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Ранг</div><div class="player-rank">${item.rank}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Подробности</div><div class="player-description">${item.description}</div></div></div>
                                    <div class="write-box">
                                        <div class="container-write-btn">
                                            <div class="wrap-write-btn">
                                                <div class="write-bgbtn"></div>
                                                <button class="write-btn"><b>НАПИСАТЬ</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        } else if (type === 'teams') {
                            cardHtml = `
                                <div class="universal-card">
                                    <div class="element"><div class="user_login">${item.login}</div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Название команды</div><div class="team-name">${item.team_name}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Количество игроков</div><div class="team-number-of-players">${item.number_of_players}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Минимальный ранг</div><div class="team-min-rank">${item.min_rank}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Требуемый возраст</div><div class="team-min-age">${item.min_age}</div></div></div>
                                    <div class="element"><div class="list-item"><div class="about-item">Подробности</div><div class="team-description">${item.description}</div></div></div>
                                    <div class="write-box">
                                        <div class="container-write-btn">
                                            <div class="wrap-write-btn">
                                                <div class="write-bgbtn"></div>
                                                <button class="write-btn"><b>НАПИСАТЬ</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }

                        $(container).prepend(cardHtml); // Добавляем новую запись в начало
                    });

                    if (type === 'players') {
                        lastIdPlayers = response.lastId;
                    } else {
                        lastIdTeams = response.lastId;
                    }
                }
            },
            error: function() {
                console.error('Ошибка при выполнении AJAX-запроса.');
            }
        });
    }

    function updateCards() {
        loadCards('players', lastIdPlayers);
        loadCards('teams', lastIdTeams);
    }

    $(document).ready(function() {
        // Загружаем начальные данные
        loadCards('players', lastIdPlayers);
        loadCards('teams', lastIdTeams);

        // Обновляем каждые 3 секунды
        setInterval(updateCards, 3000);
    });
   
    
    // Модальное окно
    $(document).on("click", ".write-btn", function () {
        var recipientLogin = $(this).closest(".universal-card").find(".user_login").text();

        $(".recipient-info").html("<b>Получатель:</b> " + recipientLogin);
        $(".modal-messages").html(""); // Очищаем сообщения
        $("#modal").fadeIn(200).addClass("show");
    });

    // Закрытие по клику на крестик
    $(".close").click(function () {
        $("#modal").fadeOut(200, function () {
            $(this).removeClass("show");
        });
    });

    // Закрытие по клику вне модального окна
    $(document).mouseup(function (e) {
        var modalContent = $(".modal-content");
        if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {
            $("#modal").fadeOut(200, function () {
                $(this).removeClass("show");
            });
        }
    });

    // Функция для вывода сообщений в модальное окно
    function showModalMessage(type, text) {
        var messageClass = type === "error" ? "error-message" : "success-message";
        $(".modal-messages").html("<div class='" + messageClass + "'>" + text + "</div>");
    }

    // Отправка сообщения (AJAX)
    $("#send-message").click(function () {
        var recipientLogin = $(".recipient-info").text().replace("Получатель: ", "").trim();
        var message = $("#message-text").val().trim();
        var idGame = $('#id_game').val(); // ID игры

        if (message === "") {
            showModalMessage("error", "Введите сообщение!");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../forms/send_message.php",
            data: { recipient: recipientLogin, message: message, id_game: idGame },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    showModalMessage("success", response.message);
                    $("#message-text").val(""); // Очищаем поле ввода

                    // Закрытие модального окна через 1.3 секунды
                    setTimeout(function () {
                        $("#modal").fadeOut(200, function () {
                            $(this).removeClass("show");
                        });
                    }, 1300);
                } else {
                    showModalMessage("error", response.message);
                }
            },
            error: function () {
                showModalMessage("error", "Ошибка отправки сообщения.");
            }
        });
    });

});

