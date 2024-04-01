<div class="toast-bg" style="display: none;">
    <div class="toast-content">
        <div class="toast-msg">
            <p class="message"></p>
            <button onclick="hideToast()">Okay</button>
        </div>
    </div>
</div>
<script>
    function toast(msg) {
        const message = document.querySelector('.message');
        message.textContent = msg
        const toastbg = document.querySelector('.toast-bg')
        toastbg.style.display = 'flex'
    }

    function hideToast() {
        const toastbg = document.querySelector('.toast-bg')
        toastbg.style.display = 'none'
    }

        const params = new URLSearchParams(window.location.search)
        const answer = params.get('correct')
        console.log({answer})
        if(answer){
            toast("You earn a point")
            setTimeout(()=>{
                window.location.href = `quest.php?quiz_id=${answer}`
            },2000)
        }
        const congrats = params.get('congrats');
        if(congrats){
            toast("Congrats")
            setTimeout(()=>{
                window.location.href = `signin.php`
            },2000)
        }
        console.log({congrats})

        const incorrect = params.get('incorrect');
        if(incorrect){
            toast("Incorrect Password")
            setTimeout(()=>{
                window.location.href = `confirmDelete.php`
            },2000)
        }

        const deleteAccount = params.get('delete');
        if(deleteAccount){
            toast("Account Deleted")
            setTimeout(()=>{
                window.location.href = `logout.php`
            },2000)
        }



</script>