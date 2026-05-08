function hcOgunKalorisiHesapla() {
    const toplam = parseFloat(document.getElementById('hc-ok-toplam').value);
    const sayi = parseInt(document.getElementById('hc-ok-sayi').value);

    if (!toplam) {
        alert('Lütfen günlük toplam kalori hedefinizi girin.');
        return;
    }

    const esit = toplam / sayi;
    document.getElementById('hc-ok-equal').innerText = Math.round(esit).toLocaleString('tr-TR') + ' kcal';

    const list = document.getElementById('hc-ok-sample-list');
    list.innerHTML = '';

    if (sayi === 3) {
        addMeal(list, 'Kahvaltı (%30)', toplam * 0.3);
        addMeal(list, 'Öğle Yemeği (%40)', toplam * 0.4);
        addMeal(list, 'Akşam Yemeği (%30)', toplam * 0.3);
    } else if (sayi === 4) {
        addMeal(list, 'Kahvaltı (%25)', toplam * 0.25);
        addMeal(list, 'Öğle Yemeği (%35)', toplam * 0.35);
        addMeal(list, 'Atıştırmalık (%10)', toplam * 0.1);
        addMeal(list, 'Akşam Yemeği (%30)', toplam * 0.3);
    } else {
        for (let i = 1; i <= sayi; i++) {
            addMeal(list, `${i}. Öğün`, esit);
        }
    }

    document.getElementById('hc-ogun-kalorisi-result').classList.add('visible');
}

function addMeal(parent, label, value) {
    const li = document.createElement('li');
    li.style.display = 'flex';
    li.style.justifyContent = 'space-between';
    li.style.padding = '5px 0';
    li.innerHTML = `<span>${label}</span> <strong>${Math.round(value).toLocaleString('tr-TR')} kcal</strong>`;
    parent.appendChild(li);
}
