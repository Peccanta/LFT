document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector(".center-button button");
    const playerAndTeamList = document.getElementById("playerANDteam_list");
    const messagesList = document.getElementById("messages");
    
    // Устанавливаем начальное состояние
    messagesList.style.display = "none";
    let showingMessages = false;
    
    toggleButton.addEventListener("click", function() {
        showingMessages = !showingMessages;
        
        if (showingMessages) {
            playerAndTeamList.style.display = "none";
            messagesList.style.display = "block";
            toggleButton.textContent = "ОТПРАВЛЕННЫЕ ЗАЯВКИ";
        } else {
            playerAndTeamList.style.display = "block";
            messagesList.style.display = "none";
            toggleButton.textContent = "ВХОДЯЩИЕ СООБЩЕНИЯ";
        }
    });
});
