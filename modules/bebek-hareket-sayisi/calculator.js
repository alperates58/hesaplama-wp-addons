let hcKickCount = 0;
let hcKickStartTime = null;
let hcKickInterval = null;

function hcAddKick() {
    if (hcKickCount === 0) {
        hcKickStartTime = new Date();
        hcKickInterval = setInterval(hcUpdateKickTimer, 1000);
    }
    
    hcKickCount++;
    document.getElementById('hc-kick-counter').innerText = hcKickCount;

    if (hcKickCount >= 10) {
        const now = new Date();
        const diff = Math.round((now - hcKickStartTime) / (60 * 1000));
        clearInterval(hcKickInterval);
        document.getElementById('hc-kick-status').innerHTML = `<span style="color:#2e7d32; font-weight:bold;">Tebrikler! 10 harekete ${diff} dakikada ulaşıldı.</span><br>Bebeğinizin hareketliliği normal görünüyor.`;
    }
}

function hcUpdateKickTimer() {
    const now = new Date();
    const diffSec = Math.floor((now - hcKickStartTime) / 1000);
    const m = Math.floor(diffSec / 60);
    const s = diffSec % 60;
    document.getElementById('hc-kick-timer').innerText = `Süre: ${m < 10 ? '0'+m : m}:${s < 10 ? '0'+s : s}`;

    if (m >= 120 && hcKickCount < 10) {
        clearInterval(hcKickInterval);
        document.getElementById('hc-kick-status').innerHTML = `<span style="color:#c62828; font-weight:bold;">Dikkat! 2 saat doldu ve 10 harekete ulaşılamadı.</span><br>Bir şeyler yiyip sol yanınıza uzanarak tekrar deneyin veya doktorunuza danışın.`;
    }
}

function hcResetKick() {
    hcKickCount = 0;
    hcKickStartTime = null;
    clearInterval(hcKickInterval);
    document.getElementById('hc-kick-counter').innerText = '0';
    document.getElementById('hc-kick-timer').innerText = 'Süre: 00:00';
    document.getElementById('hc-kick-status').innerText = '*2 saat içinde en az 10 hareket hissetmeniz beklenir.';
}
