function hcCmHesapla() {
    const total = parseFloat(document.getElementById('hc-cm-total').value);
    const target = parseFloat(document.getElementById('hc-cm-target').value);

    if (isNaN(total)) {
        alert('Lütfen toplam kapasiteyi girin.');
        return;
    }

    const anti = (total * target) / 100;
    const water = total - anti;

    document.getElementById('hc-cm-anti').innerText = anti.toFixed(2) + " L";
    document.getElementById('hc-cm-water').innerText = water.toFixed(2) + " L";

    document.getElementById('hc-cm-result').classList.add('visible');
}
