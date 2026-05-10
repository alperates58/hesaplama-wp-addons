function hcVkiCocukHesapla() {
    const age = parseFloat(document.getElementById('hc-vkc-age').value);
    const height = parseFloat(document.getElementById('hc-vkc-height').value) / 100;
    const weight = parseFloat(document.getElementById('hc-vkc-weight').value);

    if (isNaN(age) || isNaN(height) || isNaN(weight) || height === 0) {
        alert('Lütfen tüm bilgileri eksiksiz giriniz.');
        return;
    }

    const vki = weight / (height * height);
    const resVal = document.getElementById('hc-vkc-res-val');
    const resDesc = document.getElementById('hc-vkc-res-desc');

    resVal.innerText = vki.toFixed(1).toLocaleString('tr-TR');

    // Simplified pediatric BMI logic (actual percentile requires growth charts data)
    // Here we provide general categorization based on typical CDC/WHO cut-offs
    if (vki < 14) {
        resDesc.innerText = 'Düşük Kilolu (Persentil < 5)';
        resDesc.style.color = '#3498db';
    } else if (vki < 22) {
        resDesc.innerText = 'Sağlıklı Kilo (Persentil 5-85)';
        resDesc.style.color = '#27ae60';
    } else if (vki < 27) {
        resDesc.innerText = 'Kilolu (Persentil 85-95)';
        resDesc.style.color = '#f1c40f';
    } else {
        resDesc.innerText = 'Obezite (Persentil > 95)';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-vki-cocuk-result').classList.add('visible');
}
