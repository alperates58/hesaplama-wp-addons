function hc702010Hesapla() {
    const income = parseFloat(document.getElementById('hc-70-income').value) || 0;

    const life = income * 0.70;
    const savings = income * 0.20;
    const extra = income * 0.10;

    document.getElementById('hc-70-res-life').innerText = life.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-70-res-savings').innerText = savings.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-70-res-extra').innerText = extra.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-702010-result').classList.add('visible');
}
