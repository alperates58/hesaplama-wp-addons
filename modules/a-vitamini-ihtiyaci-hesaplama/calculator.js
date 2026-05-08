function hcVitaminAHesapla() {
    const cinsiyet = document.getElementById('hc-va-cinsiyet').value;
    const yas = parseFloat(document.getElementById('hc-va-yas').value);
    const durum = document.getElementById('hc-va-durum').value;

    if (!yas) {
        alert('Lütfen yaşınızı girin.');
        return;
    }

    let rda = 0;

    if (yas <= 3) rda = 300;
    else if (yas <= 8) rda = 400;
    else if (yas <= 13) rda = 600;
    else {
        if (cinsiyet === 'erkek') {
            rda = 900;
        } else {
            if (durum === 'gebe') rda = 770;
            else if (durum === 'emzirme') rda = 1300;
            else rda = 700;
        }
    }

    document.getElementById('hc-va-value').innerText = rda.toLocaleString('tr-TR') + ' mcg RAE';
    document.getElementById('hc-vit-a-result').classList.add('visible');
}
