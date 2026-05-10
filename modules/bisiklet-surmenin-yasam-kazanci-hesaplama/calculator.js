function hcBisikletSürmeninYaşamKazancıHesapla() {
    const minPerWeek = parseFloat(document.getElementById('hc-life-min').value);

    if (!minPerWeek) return;

    // Yapılan çalışmalara göre (örn: Utrecht Üniversitesi), bisiklet sürülen her 1 saatin 
    // ömrü yaklaşık 1 saat uzattığı tahmin edilmektedir.
    // Haftalık X dakika -> Yıllık (X * 52) dakika kazanç.
    const yearlyMinGain = minPerWeek * 52;
    const days = Math.floor(yearlyMinGain / (24 * 60));
    const hours = Math.round((yearlyMinGain % (24 * 60)) / 60);

    let resultText = "";
    if (days > 0) resultText += days + " Gün ";
    resultText += hours + " Saat";

    document.getElementById('hc-life-val').innerText = resultText;
    document.getElementById('hc-life-desc').innerText = "Her pedal çevirişiniz, sadece gideceğiniz yere değil, daha sağlıklı bir geleceğe de yatırımdır.";
    document.getElementById('hc-life-result').classList.add('visible');
}
