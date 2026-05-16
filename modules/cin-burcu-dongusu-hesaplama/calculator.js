function hcCinDongusuHesapla() {
    const year = parseInt(document.getElementById('hc-cbd-year').value);
    if (!year) {
        alert('Lütfen doğum yılınızı girin.');
        return;
    }

    const stems = ["Yang Ağaç", "Yin Ağaç", "Yang Ateş", "Yin Ateş", "Yang Toprak", "Yin Toprak", "Yang Metal", "Yin Metal", "Yang Su", "Yin Su"];
    const branches = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];

    // 1984 is the start of a 60-year cycle (Yang Wood Rat)
    // 1984 is Stem index 0, Branch index 0.
    let stemIdx = (year - 1984) % 10;
    if (stemIdx < 0) stemIdx += 10;

    let branchIdx = (year - 1984) % 12;
    if (branchIdx < 0) branchIdx += 12;

    const myStem = stems[stemIdx];
    const myBranch = branches[branchIdx];

    const cycleNumber = ((year - 1984) % 60) + 1;
    const finalCycleNum = cycleNumber <= 0 ? cycleNumber + 60 : cycleNumber;

    document.getElementById('hc-cbd-value').innerText = `${myStem} ${myBranch}`;
    document.getElementById('hc-cbd-desc').innerHTML = `
        <p>Çin Takviminde her yıl, 10 Gök Sapı ve 12 Yer Dalı'nın birleşimiyle oluşan 60 yıllık büyük bir döngünün parçasıdır.</p>
        <p>Siz bu 60 yıllık döngünün <strong>${finalCycleNum}.</strong> yılında doğdunuz. Bu birleşim sizin temel yaşam enerjinizi ve karakteristik yapınızı belirler.</p>
        <p><strong>${myStem}</strong> elementi ruhsal yönünüzü, <strong>${myBranch}</strong> burcu ise fiziksel ve sosyal yönünüzü temsil eder.</p>
    `;
    document.getElementById('hc-cin-burcu-dongusu-result').classList.add('visible');
}
