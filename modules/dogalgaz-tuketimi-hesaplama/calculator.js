function hcGazTuketimiHesapla() {
    const oldIndex = parseFloat(document.getElementById('hc-gc-old').value);
    const newIndex = parseFloat(document.getElementById('hc-gc-new').value);
    const days = parseFloat(document.getElementById('hc-gc-days').value);

    if (isNaN(oldIndex) || isNaN(newIndex) || isNaN(days)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (newIndex < oldIndex) {
        alert('Son endeks önceki endeksten küçük olamaz.');
        return;
    }

    const total = newIndex - oldIndex;
    const daily = total / days;

    document.getElementById('hc-res-gc-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 }) + ' m³';
    document.getElementById('hc-res-gc-daily').innerText = daily.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 }) + ' m³/gün';

    document.getElementById('hc-gc-result').classList.add('visible');
}
