function hcCinSansliSayiHesapla() {
    const year = parseInt(document.getElementById('hc-cln-year').value);
    if (!year) {
        alert('Lütfen doğum yılınızı girin.');
        return;
    }

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    let idx = (year - 1900) % 12;
    if (idx < 0) idx += 12;

    const luckyData = [
        { name: "Fare", nums: "2, 3" },
        { name: "Öküz", nums: "1, 4" },
        { name: "Kaplan", nums: "1, 3, 4" },
        { name: "Tavşan", nums: "3, 4, 6" },
        { name: "Ejderha", nums: "1, 6, 7" },
        { name: "Yılan", nums: "2, 8, 9" },
        { name: "At", nums: "2, 3, 7" },
        { name: "Keçi", nums: "2, 7" },
        { name: "Maymun", nums: "4, 9" },
        { name: "Horoz", nums: "5, 7, 8" },
        { name: "Köpek", nums: "3, 4, 9" },
        { name: "Domuz", nums: "2, 5, 8" }
    ];

    const myData = luckyData[idx];

    document.getElementById('hc-cln-content').innerText = myData.nums;
    document.getElementById('hc-cln-desc').innerHTML = `<p><strong>${year}</strong> yılı doğumlu olduğunuz için Çin burcunuz <strong>${myData.name}</strong>'dir.</p><p>Bu sayılar hayatınızın farklı alanlarında (ev numarası, telefon, önemli tarihler vb.) size şans getirebilir.</p>`;
    document.getElementById('hc-cin-lucky-num-result').classList.add('visible');
}
