import {ref} from "vue";
import axios from "axios";

function handleOpenChat(event) {
    event.preventDefault(); // Предотвращаем переход по ссылке, если нужно
    let chatId = event.currentTarget.getAttribute('data-chat-id');
    console.log('Chat ID:', chatId);
    // Здесь можно выполнить любые действия с chatId
    // Например, отправить его на сервер через AJAX
}


export default function useChat() {
    const messages = ref([]);
    const errors = ref([]);
    let chatId;

    function getChatId(){
        return window.location.href.split('/').pop();
    }

    const getMessage = async () => {
        const urlParams = window.location.href;
        chatId = getChatId();
        await axios.get(`/chat/messages/${chatId}`).then((response) => {
            messages.value = response.data
            console.log('message', messages);
        })
    }

    const addMessage = async (form) => {
        console.log('form with message', form, form.value, form.message) // отрабатывае
        chatId = getChatId();
        console.log('chatid', chatId);
        errors.value = [];
        try {
            await axios.post(`/chat/send/${chatId}`, form).then((response) => {
                messages.value.push(response.data);
                console.log('resp data', messages);
            })
        } catch (e) {
            console.log('Ошибка12', e.message, e.response, e.data, e.value)
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }

    }

    console.log('messages from main', messages.value)
    return {
        messages,
        errors,
        addMessage,
        getMessage,
    }
}
