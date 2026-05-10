function hcBarthelHesapla() {
    const questions = document.querySelectorAll('.hc-bi-q');
    let total = 0;
    questions.forEach(q => {
        total += parseInt(q.value);
    });

    document.getElementById('hc-bi-val').innerText = total + ' / 100';
    
    let desc = "";
    if (total <= 20) desc = "Tam Bağımlı";
    else if (total <= 60) desc = "Ağır Bağımlı";
    else if (total <= 90) desc = "Orta Bağımlı";
    else if (total < 100) desc = "Hafif Bağımlı";
    else desc = "Tam Bağımsız";

    document.getElementById('hc-bi-desc').innerText = desc;
    document.getElementById('hc-bi-result').classList.add('visible');
}
