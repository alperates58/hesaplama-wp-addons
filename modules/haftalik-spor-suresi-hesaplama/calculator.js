function hcHaftalikSporSuresiHesapla() {
    const inputs = document.querySelectorAll('.hc-day-min');
    let total = 0;
    inputs.forEach(i => total += parseInt(i.value) || 0);

    document.getElementById('hc-weekly-val').innerText = total + ' Dakika';
    
    let comment = "";
    if (total < 150) {
        comment = "DSÖ önerisi olan haftalık 150 dakikanın altındasınız. Hareketliliğinizi artırmayı hedefleyin.";
    } else if (total <= 300) {
        comment = "Tebrikler! Sağlıklı bir yaşam için yeterli düzeyde egzersiz yapıyorsunuz.";
    } else {
        comment = "Harika! Aktif bir yaşam tarzınız var. Toparlanma (recovery) sürelerine de dikkat etmeyi unutmayın.";
    }

    document.getElementById('hc-weekly-comment').innerText = comment;
    document.getElementById('hc-weekly-result').classList.add('visible');
}
