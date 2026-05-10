function hcTeaCountHesapla() {
    const guests = parseFloat(document.getElementById('hc-tc-guests').value);
    const strength = document.getElementById('hc-tc-strength').value;

    if (isNaN(guests) || guests <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Kişi başı ortalama 2 bardak çay, 1 bardak için ~2-3g kuru çay
    let teaPerPerson = 5; // gram
    if (strength === 'light') teaPerPerson = 3;
    else if (strength === 'strong') teaPerPerson = 7;

    const totalTea = guests * teaPerPerson;
    const totalWater = guests * 0.3; // litre

    document.getElementById('hc-tc-res').innerText = totalTea.toLocaleString('tr-TR') + ' g Çay';
    document.getElementById('hc-tc-info').innerText = `Yaklaşık ${totalWater.toLocaleString('tr-TR')} litre su ile demlemeniz önerilir.`;
    
    document.getElementById('hc-tea-count-result').classList.add('visible');
}
