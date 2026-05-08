function hc503020Hesapla() {
    const income = parseFloat(document.getElementById('hc-50-income').value) || 0;

    const needs = income * 0.50;
    const wants = income * 0.30;
    const savings = income * 0.20;

    document.getElementById('hc-50-res-needs').innerText = needs.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-50-res-wants').innerText = wants.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-50-res-savings').innerText = savings.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-503020-result').classList.add('visible');
}
