function hcPrepTimeHesapla() {
    const prep = parseFloat(document.getElementById('hc-pt-prep').value) || 0;
    const cook = parseFloat(document.getElementById('hc-pt-cook').value) || 0;
    const rest = parseFloat(document.getElementById('hc-pt-rest').value) || 0;

    const total = prep + cook + rest;
    const hours = Math.floor(total / 60);
    const mins = total % 60;

    let resText = hours > 0 ? `${hours} Saat ${mins} Dakika` : `${mins} Dakika`;
    
    const now = new Date();
    const readyAt = new Date(now.getTime() + total * 60000);
    const timeStr = readyAt.getHours().toString().padStart(2, '0') + ':' + readyAt.getMinutes().toString().padStart(2, '0');

    document.getElementById('hc-pt-val').innerText = resText;
    document.getElementById('hc-pt-info').innerText = `Şimdi başlarsanız yemeğiniz saat ${timeStr} civarında servise hazır olacaktır.`;
    
    document.getElementById('hc-prep-time-result').classList.add('visible');
}
