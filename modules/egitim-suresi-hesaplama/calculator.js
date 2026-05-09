function hcEsHesapla() {
    const startVal = document.getElementById('hc-es-start').value;
    const endVal = document.getElementById('hc-es-end').value;

    if (!startVal || !endVal) {
        alert('Lütfen tarihleri seçin.');
        return;
    }

    const start = new Date(startVal);
    const end = new Date(endVal);

    if (start > end) {
        alert('Başlangıç tarihi bitiş tarihinden sonra olamaz.');
        return;
    }

    const diffTime = Math.abs(end - start);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    const years = Math.floor(diffDays / 365);
    const months = Math.floor((diffDays % 365) / 30);
    const days = (diffDays % 365) % 30;

    let res = "";
    if (years > 0) res += years + " Yıl ";
    if (months > 0) res += months + " Ay ";
    if (days > 0) res += days + " Gün";

    document.getElementById('hc-es-val').innerText = res || "0 Gün";
    document.getElementById('hc-es-result').classList.add('visible');
}
