$(document).ready(function() {
    $.ajax({
        url: '../forms/get_profile_data.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                console.error(response.error);
                return;
            }

            // Отрисовка игроков
            let playersHtml = '';
            response.players.forEach(player => {
                playersHtml += `
                    <div class="universal-card"  data-id="${player.id_player}">
                        <div class="element"><div class="center-image"><div class="game_img" style="background: url('${player.game_img}') center/cover no-repeat; width: 80px; height: 80px;"></div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Имя</div><div class="player-name">${player.player_name}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Возраст</div><div class="player-age">${player.age}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Никнейм</div><div class="player-nickname">${player.nickname}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Ранг</div><div class="player-rank">${player.rank}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Подробности</div><div class="player-description">${player.description}</div></div></div>
                        <div class="flex_delete-box">
                            <div class="delete-box">
                                <a class="button" role="button">
	                            <span><b>удалить</b></span>
	                            <div class="icon">
		                            <i class="fa fa-remove"></i>
	                            </div>
                                </a>
                            </div>
                        </div>
                    </div>`;
            });
            $('#players_container').html(playersHtml);

            // Отрисовка команд
            let teamsHtml = '';
            response.teams.forEach(team => {
                teamsHtml += `
                    <div class="universal-card" data-id="${team.id_team}">
                        <div class="element"><div class="center-image"><div class="game_img" style="background: url('${team.game_img}') center/cover no-repeat; width: 80px; height: 80px;"></div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Название команды</div><div class="team-name">${team.team_name}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Количество игроков</div><div class="team-number-of-players">${team.number_of_players}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Минимальный ранг</div><div class="team-min-rank">${team.min_rank}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Требуемый возраст</div><div class="team-min-age">${team.min_age}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Подробности</div><div class="team-description">${team.description}</div></div></div>
                        <div class="flex_delete-box">
                            <div class="delete-box">
                                <a class="button" role="button">
	                            <span><b>удалить</b></span>
	                            <div class="icon">
		                            <i class="fa fa-remove"></i>
	                            </div>
                                </a>
                            </div>
                        </div>
                    </div>`;
            });
            $('#teams_container').html(teamsHtml);

            // Отрисовка сообщений
            let messagesHtml = '';
            response.messages.forEach(message => {
                messagesHtml += `
                    <div class="universal-card" data-id="${message.id_respond}">
                        <div class="element"><div class="center-image"><div class="game_img" data-id="${message.id_game}" style="background: url('${message.game_img}') center/cover no-repeat; width: 80px; height: 80px;"></div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Отправитель</div><div class="sender">${message.sender_login}</div></div></div>
                        <div class="element"><div class="list-item"><div class="about-item">Сообщение</div><div class="message">${message.message}</div></div></div>
                        <div class="write-box">
                            <div class="container-write-btn">
                                <div class="wrap-write-btn">
                                    <div class="write-bgbtn"></div>
                                    <button class="write-btn"><b>ОТВЕТИТЬ</b></button>
                                </div>
                            </div>
                        </div>
                        <div class="flex_delete-box">
                            <div class="delete-box">
                                <a class="button" role="button">
	                            <span><b>удалить</b></span>
	                            <div class="icon">
		                            <i class="fa fa-remove"></i>
	                            </div>
                                </a>
                            </div>
                        </div>
                    </div>`;
            });
            $('#messages_container').html(messagesHtml);
        },
        error: function(xhr, status, error) {
            console.error("Ошибка загрузки данных: ", error);
        }
    });


    // MESSAGE
    $(document).on("click", ".write-btn", function () {
        var card = $(this).closest(".universal-card");
        var recipientLogin = card.find(".sender").text(); // Получаем логин отправителя
        var idGame = card.find(".game_img").data("id");
    
        $(".recipient-info").html("<b>Получатель:</b> " + recipientLogin);
        $(".modal-messages").html(""); // Очищаем сообщения
        $("#message-text").val(""); // Очищаем поле ввода
    
        // Сохраняем данные в атрибуты модального окна
        $("#modal").data("recipient", recipientLogin);
        $("#modal").data("id_game", idGame);
    
        $("#modal").fadeIn(200).addClass("show");
    });
    
    // Закрытие модального окна
    $(".close").click(function () {
        $("#modal").fadeOut(200, function () {
            $(this).removeClass("show");
        });
    });
    
    $(document).mouseup(function (e) {
        var modalContent = $(".modal-content");
        if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {
            $("#modal").fadeOut(200, function () {
                $(this).removeClass("show");
            });
        }
    });
    
    // Функция показа сообщения в модальном окне
    function showModalMessage(type, text) {
        var messageClass = type === "error" ? "error-message" : "success-message";
        $(".modal-messages").html("<div class='" + messageClass + "'>" + text + "</div>");
    }
    
    // Отправка сообщения AJAX
    $("#send-message").click(function () {
        var recipientLogin = $("#modal").data("recipient");
        var message = $("#message-text").val().trim();
        var idGame = $("#modal").data("id_game");
    
        if (message === "") {
            showModalMessage("error", "Введите сообщение!");
            return;
        }
    
        $.ajax({
            type: "POST",
            url: "../forms/recipient_message.php",
            data: { recipient: recipientLogin, message: message, id_game: idGame },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    showModalMessage("success", response.message);
                    $("#message-text").val(""); // Очищаем поле ввода
    
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
    

    // DELETE
    $(document).ready(function () {
        let deleteCard = null;
        let deleteId = null;
        let deleteType = null;
        let deleteField = null; // Название поля ID (id_player, id_team, id_respond)
    
        $(document).on("click", ".delete-box .button", function () {
            deleteCard = $(this).closest(".universal-card");
    
            if (deleteCard.find(".player-name").length) {
                deleteType = "players";
                deleteField = "id_player";
                deleteId = deleteCard.data("id");
            } else if (deleteCard.find(".team-name").length) {
                deleteType = "teams";
                deleteField = "id_team";
                deleteId = deleteCard.data("id");
            } else if (deleteCard.find(".sender").length) {
                deleteType = "responds";
                deleteField = "id_respond";
                deleteId = deleteCard.data("id");
            }
    
            if (!deleteId || !deleteType || !deleteField) {
                console.error("Ошибка: не удалось определить ID или тип.");
                return;
            }
    
            $("#delete_confirm").fadeIn(200).addClass("show");
        });
    
        $("#no").click(function () {
            $("#delete_confirm").fadeOut(200).removeClass("show");
        });
    
        $("#yes").click(function () {
            if (!deleteId || !deleteType || !deleteField) return;
    
            $.ajax({
                type: "POST",
                url: "../forms/delete_card.php",
                data: { id: deleteId, type: deleteType, field: deleteField },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        deleteCard.fadeOut(300, function () {
                            $(this).remove();
                        });
                        $("#delete_confirm").fadeOut(200).removeClass("show");
                    } else {
                        alert("Ошибка: " + response.message);
                    }
                },
                error: function () {
                    alert("Ошибка удаления.");
                }
            });
        });
    });
    
});
