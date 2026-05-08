function hcOrucKaloriHesapla() {
    const tdee = parseFloat(document.getElementById('hc-fc-tdee').value);
    const style = document.getElementById('hc-fc-style').value;

    if (!tdee) {
        alert('Lütfen günlük kalori ihtiyacınızı girin.');
        return;
    }

    const distContainer = document.getElementById('hc-fc-distribution');
    distContainer.innerHTML = '';

    if (style === 'ramadan') {
        addMealItem(distContainer, 'İftar (%50)', tdee * 0.5);
        addMealItem(distContainer, 'Ara Öğün (%15)', tdee * 0.15);
        addMealItem(distContainer, 'Sahur (%35)', tdee * 0.35);
    } else {
        addMealItem(distContainer, '1. Öğün (Açılış - %45)', tdee * 0.45);
        addMealItem(distContainer, 'Ara Öğün (%10)', tdee * 0.1);
        addMealItem(distContainer, '2. Öğün (Kapanış - %45)', tdee * 0.45);
    }

    document.getElementById('hc-fasting-result').classList.add('visible');
}

function addMealItem(parent, label, value) {
    const div = document.createElement('div');
    div.className = 'hc-result-item';
    div.style.display = 'flex';
    div.style.justifyContent = 'space-between';
    div.style.padding = '10px 0';
    div.style.borderBottom = '1px solid #eee';
    div.innerHTML = `<span>${label}</span> <strong>${Math.round(value).toLocaleString('tr-TR')} kcal</strong>`;
    parent.appendChild(div);
}
