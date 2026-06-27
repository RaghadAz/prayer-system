
// let collectedAnswers={};

// const questionSets = {
//   // Each question uses a 4-flower scale; the labels below the flowers are these option texts.
//   default: [
//     {
//       id: 'm1',
//       text: 'صلاة الفجر',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm2',
//       text: 'صلاة الظهر',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm3',
//       text: 'صلاة العصر',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm4',
//       text: 'صلاة المغرب',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm5',
//       text: 'صلاة العشاء',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm6',
//       text: 'سنة الفجر',
//       options: ['ركعتين ', 'لم أصلها']
//     },

//    {
//       id: 'm7',
//       text: 'سنة الظهر القبلية',
//       options: ['4 ركعات ', 'ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm8',
//       text: 'سنة الظهر البعدية',
//       options: ['4 ركعات ', 'ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm9',
//       text: 'سنة العصر',
//       options: ['4 ركعات ', 'ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm10',
//       text: 'سنة المغرب',
//       options: ['ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm11',
//       text: 'سنة العشاء',
//       options: ['ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm12',
//       text: 'الضحى',
//       options: ['6 ركعات او اكثر', '4 ركعات', 'ركعتين' , 'لم أصلها']
//     },

//     {
//       id: 'm13',
//       text: 'الأوابين',
//       options: ['6 ركعات او اكثر', '4 ركعات', 'ركعتين' , 'لم أصلها']
//     },

//     {
//       id: 'm14',
//       text: 'قيام الليل',
//       options: ['6 ركعات او اكثر', '4 ركعات', 'ركعتين' , 'لم أصلها']
//     },

//     {
//       id: 'm15',
//       text: 'الوتر',
//       options: ['3 ركعات', 'ركعة', 'لم  أصله']
//     },

//     {
//       id: 'ََm16',
//       text: 'تلاوة القرآن الكريم',
//       options: ['أكثر من جزء','10-20 صفحة', '1-10 صفحات', '0']
//     },

//     {
//       id: 'ََm17',
//       text: 'حفظ القرآن الكريم',
//       options: ['أكثر من 10 صفحات','5-10 صفحة', '1-5 صفحات', '0']
//     },

//     {
//       id: 'ََm18',
//       text: 'بر الأم',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'ََm19',
//       text: 'بر الأب',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'm20',
//       text: 'الورد الصباحي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm21',
//       text: 'الورد المسائي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'ََm22',
//       text: 'ساعات الدراسة',
//       options: ['اكثر من 6 ساعات','3-5 ساعات','ساعة-ساعتين', 'اقل من ساعة', '0']
//     },

//     {
//       id: 'ََm23',
//       text: 'الوقت الضائع',
//       options: ['0', 'اقل من ساعة','ساعة-ساعتين','3-5 ساعات','اكثر من 6 ساعات' ]
//     },

//     {
//       id: 'm24',
//       text: 'عمل خير',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm22',
//       text: 'افراح قلب ',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm23',
//       text: ' إحياء السنة الاسبوعية ',
//       options: ['تم ', '——']
//     }
//   ],
//   alternate: [
//     {
//       id: 'm1',
//       text: 'استغفار فرض الفجر',
//       options: ['200-250','150-200','100-150', '1-100', '0']
//     },

//     {
//       id: 'm2',
//       text: 'استغفار فرض الظهر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm3',
//       text: 'استغفار فرض العصر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm4',
//       text: 'استغفار فرض المغرب',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm5',
//       text: 'استغفار فرض العشاء',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm6',
//       text: 'الصلاة على النبي لسنة الفجر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//    {
//       id: 'm7',
//       text: 'الصلاة على النبي لسنة الظهر القبلية',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm8',
//       text: 'الصلاة على النبي لسنة الظهر البعدية',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm9',
//       text: 'الصلاة على النبي لسنة العصر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm10',
//       text: 'الصلاة على النبي لسنة المغرب',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm11',
//       text: 'الصلاة على النبي لسنة العشاء',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm12',
//       text: 'تسبيحات الضحى',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm13',
//       text: 'تسبيحات الأوابين',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm14',
//       text: 'تسبيحات قيام الليل',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm15',
//       text: 'تسبيحات الوتر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'ََm17',
//       text: 'حفظ الحديث النبوي الشريف',
//       options: ['أكثر من 10 احاديث','5-10 احاديث', '1-5 احاديث', '0']
//     },

//     {
//       id: 'ََm18',
//       text: 'بر الأم',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'ََm19',
//       text: 'بر الأب',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'm20',
//       text: 'الورد الصباحي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm21',
//       text: 'الورد المسائي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'ََm22',
//       text: 'ساعات الدراسة',
//       options: ['اكثر من 6 ساعات','3-5 ساعات','ساعة-ساعتين', 'اقل من ساعة', '0']
//     },

//     {
//       id: 'ََm23',
//       text: 'الوقت الضائع',
//       options: ['0', 'اقل من ساعة','ساعة-ساعتين','3-5 ساعات','اكثر من 6 ساعات' ]
//     },

//     {
//       id: 'm24',
//       text: 'عمل خير',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm22',
//       text: 'افراح قلب ',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm23',
//       text: ' إحياء السنة الاسبوعية ',
//       options: ['تم ', '——']
//     }
//   ]
// };

// const form = document.getElementById('questionsForm');
// const container = document.getElementById('questionContainer');
// const toggle = document.getElementById('questionToggle');
// const status = document.getElementById('saveStatus');

// function getActiveSetName() {
//   return toggle.checked ? 'alternate' : 'default';
// }

// function renderQuestions() {
//   const activeSet = questionSets[getActiveSetName()];
//   container.innerHTML = '';

//   activeSet.forEach((question, index) => {
//     const fieldset = document.createElement('fieldset');
//     fieldset.className = 'question-card';

//     const legend = document.createElement('legend');
//     legend.textContent = `${index + 1}. ${question.text}`;
//     fieldset.appendChild(legend);

//     const flowersRow = document.createElement('div');
//     flowersRow.className = 'flowers-row';

//     // Create flower radio buttons
//     question.options.forEach((optionLabelText, flowerIndex) => {
//       const value = (flowerIndex + 1).toString();

//       const input = document.createElement('input');
//       input.type = 'radio';
//       input.name = question.id;
//       input.value = value;
//       input.id = `${question.id}_opt_${value}`;
//       input.required = true;

//       const label = document.createElement('label');
//       label.className = 'flower-label';
//       label.setAttribute('for', input.id);

//       const img = document.createElement('img');
//       img.className = 'flower-img';
//       img.src = 'stylingtools/unchecked.svg';
//       img.alt = `زهرة ${value}`;

//       const caption = document.createElement('div');
//       caption.className = 'flower-caption';
//       caption.textContent = optionLabelText;
//       caption.setAttribute('aria-hidden', 'true');

//       label.appendChild(img);
//       label.appendChild(caption);

//       // Wrap input and label together
//       const wrapper = document.createElement('div');
//       wrapper.className = 'flower-wrapper';
//       wrapper.appendChild(input);
//       wrapper.appendChild(label);

//       flowersRow.appendChild(wrapper);
//     });

//     fieldset.appendChild(flowersRow);
//     container.appendChild(fieldset);
//   });

//   // After rendering, wire up change listeners to swap images and show selected caption styles
//   container.querySelectorAll('.flower-wrapper').forEach((wrapper) => {
//     const input = wrapper.querySelector('input[type="radio"]');
//     const img = wrapper.querySelector('.flower-img');
//     const label = wrapper.querySelector('.flower-label');

//     // Click on label should select the radio; use change listener on input
//     input.addEventListener('change', () => {
//       updateFlowersForQuestion(input.name);
//     });
//   });

//   // ensure initial visuals
//   Array.from(new Set(activeSet.map(q => q.id))).forEach(qid => updateFlowersForQuestion(qid));
// }

// function attachRadioListeners() {
//     container.querySelectorAll('input[type="radio"]').forEach(radio => {
//         radio.addEventListener('change', function () {
//             const qid = this.name; // m1, m2, m3...
//             const valueIndex = parseInt(this.value) - 1;

//             const activeSet = questionSets[getActiveSetName()];
//             const question = activeSet.find(q => q.id === qid);
//             const answerText = question.options[valueIndex];

//             collectedAnswers[qid] = answerText;
//         });
//     });
// }

// container.querySelectorAll('input[type="radio"]').forEach(radio => {
//     radio.addEventListener('change', function () {
//         const qid = this.name; // m1, m2, m3...
//         const valueIndex = parseInt(this.value) - 1;

//         // نجيب النص الحقيقي للجواب
//         const activeSet = questionSets[getActiveSetName()];
//         const question = activeSet.find(q => q.id === qid);
//         const answerText = question.options[valueIndex];

//         collectedAnswers[qid] = answerText;
//     });
// });


// function collectAnswers() {
//   const answers = {};
//   const activeSet = questionSets[getActiveSetName()];

//   activeSet.forEach((question) => {
//     const selected = form.querySelector(`input[name="${question.id}"]:checked`);
//     if (selected) {
//       // map numeric value to text label
//       const idx = parseInt(selected.value, 10) - 1;
//       answers[question.id] = question.options[idx] || selected.value;
//     } else {
//       answers[question.id] = '';
//     }
//   });

//   return answers;
// }

// function updateFlowersForQuestion(questionId) {
//   const wrappers = Array.from(container.querySelectorAll(`input[name="${questionId}"]`)).map(i => i.closest('.flower-wrapper'));
//   wrappers.forEach((wrapper) => {
//     const input = wrapper.querySelector('input[type="radio"]');
//     const img = wrapper.querySelector('.flower-img');
//     const caption = wrapper.querySelector('.flower-caption');

//     if (input.checked) {
//       img.src = '/stylingtools/checked.svg';
//       caption.style.fontWeight = '800';
//       caption.style.opacity = '1';
//     } else {
//       img.src = '/stylingtools/unchecked.svg';
//       caption.style.fontWeight = '600';
//       caption.style.opacity = '0.7';
//     }
//   });
// }

// async function saveAnswers(payload) {
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//   const response = await fetch('/student/daily-program/save', {
//     method: 'POST',
//     headers: {

//       'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(payload)
//   });

//   if (!response.ok) {
//     const message = await response.text();
//     throw new Error(message || 'حدث خطأ أثناء الحفظ');
//   }

//   return response.json();
// }

// toggle.addEventListener('change', () => {
//   status.textContent = '';
//   renderQuestions();
// });

// form.addEventListener('submit', async (event) => {
//   event.preventDefault();

//   const payload = {
//     setName: getActiveSetName(),
//     answers: collectAnswers(),
//     savedAt: new Date().toISOString()
//   };

//   try {
//     await saveAnswers(payload);
//     status.textContent = 'تم حفظ الإجابات بنجاح.';
//     form.reset();
//     toggle.checked = false;
//     renderQuestions();
//   } catch (error) {
//     status.textContent = error.message;
//   }
// });

// toggle.checked = false;
// renderQuestions();


// document.getElementById('saveProgramBtn').addEventListener('click', function () {

//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     const payload = {
//         setName: "default",
//         answers: collectedAnswers   // هاد المتغيّر لازم يكون فيه كل إجابات الطالبة
//     };

//     fetch('/student/daily-program/save', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken
//         },
//         body: JSON.stringify(payload)
//     })
//     .then(res => res.json())
//     .then(data => {
//         console.log(data);
//         alert("تم الحفظ بنجاح");
//     })
//     .catch(err => console.error(err));


// let collectAnswers={};

// const questionSets = {
//   // Each question uses a 4-flower scale; the labels below the flowers are these option texts.
//   default: [
//     {
//       id: 'm1',
//       text: 'صلاة الفجر',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm2',
//       text: 'صلاة الظهر',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm3',
//       text: 'صلاة العصر',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm4',
//       text: 'صلاة المغرب',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm5',
//       text: 'صلاة العشاء',
//       options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء']
//     },

//     {
//       id: 'm6',
//       text: 'سنة الفجر',
//       options: ['ركعتين ', 'لم أصلها']
//     },

//    {
//       id: 'm7',
//       text: 'سنة الظهر القبلية',
//       options: ['4 ركعات ', 'ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm8',
//       text: 'سنة الظهر البعدية',
//       options: ['4 ركعات ', 'ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm9',
//       text: 'سنة العصر',
//       options: ['4 ركعات ', 'ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm10',
//       text: 'سنة المغرب',
//       options: ['ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm11',
//       text: 'سنة العشاء',
//       options: ['ركعتين ', 'لم أصلها']
//     },

//     {
//       id: 'm12',
//       text: 'الضحى',
//       options: ['6 ركعات او اكثر', '4 ركعات', 'ركعتين' , 'لم أصلها']
//     },

//     {
//       id: 'm13',
//       text: 'الأوابين',
//       options: ['6 ركعات او اكثر', '4 ركعات', 'ركعتين' , 'لم أصلها']
//     },

//     {
//       id: 'm14',
//       text: 'قيام الليل',
//       options: ['6 ركعات او اكثر', '4 ركعات', 'ركعتين' , 'لم أصلها']
//     },

//     {
//       id: 'm15',
//       text: 'الوتر',
//       options: ['3 ركعات', 'ركعة', 'لم  أصله']
//     },

//     {
//       id: 'ََm16',
//       text: 'تلاوة القرآن الكريم',
//       options: ['أكثر من جزء','10-20 صفحة', '1-10 صفحات', '0']
//     },

//     {
//       id: 'ََm17',
//       text: 'حفظ القرآن الكريم',
//       options: ['أكثر من 10 صفحات','5-10 صفحة', '1-5 صفحات', '0']
//     },

//     {
//       id: 'ََm18',
//       text: 'بر الأم',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'ََm19',
//       text: 'بر الأب',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'm20',
//       text: 'الورد الصباحي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm21',
//       text: 'الورد المسائي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'ََm22',
//       text: 'ساعات الدراسة',
//       options: ['اكثر من 6 ساعات','3-5 ساعات','ساعة-ساعتين', 'اقل من ساعة', '0']
//     },

//     {
//       id: 'ََm23',
//       text: 'الوقت الضائع',
//       options: ['0', 'اقل من ساعة','ساعة-ساعتين','3-5 ساعات','اكثر من 6 ساعات' ]
//     },

//     {
//       id: 'm24',
//       text: 'عمل خير',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm22',
//       text: 'افراح قلب ',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm23',
//       text: ' إحياء السنة الاسبوعية ',
//       options: ['تم ', '——']
//     }
//   ],
//   alternate: [
//     {
//       id: 'm1',
//       text: 'استغفار فرض الفجر',
//       options: ['200-250','150-200','100-150', '1-100', '0']
//     },

//     {
//       id: 'm2',
//       text: 'استغفار فرض الظهر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm3',
//       text: 'استغفار فرض العصر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm4',
//       text: 'استغفار فرض المغرب',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm5',
//       text: 'استغفار فرض العشاء',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm6',
//       text: 'الصلاة على النبي لسنة الفجر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//    {
//       id: 'm7',
//       text: 'الصلاة على النبي لسنة الظهر القبلية',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm8',
//       text: 'الصلاة على النبي لسنة الظهر البعدية',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm9',
//       text: 'الصلاة على النبي لسنة العصر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm10',
//       text: 'الصلاة على النبي لسنة المغرب',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm11',
//       text: 'الصلاة على النبي لسنة العشاء',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm12',
//       text: 'تسبيحات الضحى',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm13',
//       text: 'تسبيحات الأوابين',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm14',
//       text: 'تسبيحات قيام الليل',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'm15',
//       text: 'تسبيحات الوتر',
//       options: ['200-250', '150-200', '100-150', '1-100', '0']
//     },

//     {
//       id: 'ََm17',
//       text: 'حفظ الحديث النبوي الشريف',
//       options: ['أكثر من 10 احاديث','5-10 احاديث', '1-5 احاديث', '0']
//     },

//     {
//       id: 'ََm18',
//       text: 'بر الأم',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'ََm19',
//       text: 'بر الأب',
//       options: ['10','9','8','7','6','5','4','3','2', '1', '0']
//     },

//     {
//       id: 'm20',
//       text: 'الورد الصباحي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm21',
//       text: 'الورد المسائي',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'ََm22',
//       text: 'ساعات الدراسة',
//       options: ['اكثر من 6 ساعات','3-5 ساعات','ساعة-ساعتين', 'اقل من ساعة', '0']
//     },

//     {
//       id: 'ََm23',
//       text: 'الوقت الضائع',
//       options: ['0', 'اقل من ساعة','ساعة-ساعتين','3-5 ساعات','اكثر من 6 ساعات' ]
//     },

//     {
//       id: 'm24',
//       text: 'عمل خير',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm25',
//       text: 'افراح قلب ',
//       options: ['تم ', '——']
//     },

//     {
//       id: 'm26',
//       text: ' إحياء السنة الاسبوعية ',
//       options: ['تم ', '——']
//     }
//   ]
// };

// const form = document.getElementById('questionsForm');
// const container = document.getElementById('questionContainer');
// const toggle = document.getElementById('questionToggle');
// const status = document.getElementById('saveStatus');

// function getActiveSetName() {
//   return toggle.checked ? 'alternate' : 'default';
// }

// function renderQuestions() {
//   const activeSet = questionSets[getActiveSetName()];
//   container.innerHTML = '';

//   activeSet.forEach((question, index) => {
//     const fieldset = document.createElement('fieldset');
//     fieldset.className = 'question-card';

//     const legend = document.createElement('legend');
//     legend.textContent = `${index + 1}. ${question.text}`;
//     fieldset.appendChild(legend);

//     const flowersRow = document.createElement('div');
//     flowersRow.className = 'flowers-row';

//     // Create flower radio buttons
//     question.options.forEach((optionLabelText, flowerIndex) => {
//       const value = (flowerIndex + 1).toString();

//       const input = document.createElement('input');
//       input.type = 'radio';
//       input.name = question.id;
//       input.value = value;
//       input.id = `${question.id}_opt_${value}`;
//       input.required = true;

//       const label = document.createElement('label');
//       label.className = 'flower-label';
//       label.setAttribute('for', input.id);

//       const img = document.createElement('img');
//       img.className = 'flower-img';
//       img.src = 'stylingtools/unchecked.svg';
//       img.alt = `زهرة ${value}`;

//       const caption = document.createElement('div');
//       caption.className = 'flower-caption';
//       caption.textContent = optionLabelText;
//       caption.setAttribute('aria-hidden', 'true');

//       label.appendChild(img);
//       label.appendChild(caption);

//       // Wrap input and label together
//       const wrapper = document.createElement('div');
//       wrapper.className = 'flower-wrapper';
//       wrapper.appendChild(input);
//       wrapper.appendChild(label);

//       flowersRow.appendChild(wrapper);
//     });

//     fieldset.appendChild(flowersRow);
//     container.appendChild(fieldset);
//   });

//   // After rendering, wire up change listeners to swap images and show selected caption styles
//   container.querySelectorAll('.flower-wrapper').forEach((wrapper) => {
//     const input = wrapper.querySelector('input[type="radio"]');
//     const img = wrapper.querySelector('.flower-img');
//     const label = wrapper.querySelector('.flower-label');

//     // Click on label should select the radio; use change listener on input
//     input.addEventListener('change', () => {
//       updateFlowersForQuestion(input.name);
//     });
//   });

//   // ensure initial visuals
//   Array.from(new Set(activeSet.map(q => q.id))).forEach(qid => updateFlowersForQuestion(qid));
// }

// function collectAnswers() {
//   const answers = {};
//   const activeSet = questionSets[getActiveSetName()];

//   activeSet.forEach((question) => {
//     const selected = form.querySelector(`input[name="${question.id}"]:checked`);
//     if (selected) {
//       // map numeric value to text label
//       const idx = parseInt(selected.value, 10) - 1;
//       answers[question.id] = question.options[idx] || selected.value;
//     } else {
//       answers[question.id] = '';
//     }
//   });

//   return answers;
// }

// function updateFlowersForQuestion(questionId) {
//   const wrappers = Array.from(container.querySelectorAll(`input[name="${questionId}"]`)).map(i => i.closest('.flower-wrapper'));
//   wrappers.forEach((wrapper) => {
//     const input = wrapper.querySelector('input[type="radio"]');
//     const img = wrapper.querySelector('.flower-img');
//     const caption = wrapper.querySelector('.flower-caption');

//     if (input.checked) {
//       img.src = '/stylingtools/checked.svg';
//       caption.style.fontWeight = '800';
//       caption.style.opacity = '1';
//     } else {
//       img.src = '/stylingtools/unchecked.svg';
//       caption.style.fontWeight = '600';
//       caption.style.opacity = '0.7';
//     }
//   });
// }

// async function saveAnswers(payload) {
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//   const response = await fetch('/student/daily-program/save', {
//     method: 'POST',
//     headers: {

//       'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(payload)
//   });

//   if (!response.ok) {
//     const message = await response.text();
//     throw new Error(message || 'حدث خطأ أثناء الحفظ');
//   }

//   return response.json();
// }

// toggle.addEventListener('change', () => {
//   status.textContent = '';
//   renderQuestions();
// });

// form.addEventListener('submit', async (event) => {
//   event.preventDefault();

//   const payload = {
//     setName: getActiveSetName(),
//     answers: collectAnswers(),
//     savedAt: new Date().toISOString()
//   };

//   try {
//     await saveAnswers(payload);
//     status.textContent = 'تم حفظ الإجابات بنجاح.';
//     form.reset();
//     toggle.checked = false;
//     renderQuestions();
//   } catch (error) {
//     status.textContent = error.message;
//   }
// });

// toggle.checked = false;
// renderQuestions();


// document.getElementById('saveProgramBtn').addEventListener('click', function () {

//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     const payload = {
//         setName: "default",
//         answers: collectedAnswers   // هاد المتغيّر لازم يكون فيه كل إجابات الطالبة
//     };

//     fetch('/student/daily-program/save', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken
//         },
//         body: JSON.stringify(payload)
//     })
//     .then(res => res.json())
//     .then(data => {
//         console.log(data);
//         alert("تم الحفظ بنجاح");
//     })
//     .catch(err => console.error(err));




// });
// });
let collectedAnswers = {};

const questionSets = {
    default: [
        { id: 'm1', text: 'صلاة الفجر', options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء'] },
        { id: 'm2', text: 'صلاة الظهر', options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء'] },
        { id: 'm3', text: 'صلاة العصر', options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء'] },
        { id: 'm4', text: 'صلاة المغرب', options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء'] },
        { id: 'm5', text: 'صلاة العشاء', options: ['أول الوقت', 'وسط الوقت', 'آخر الوقت', 'قضاء'] },

        { id: 'm6', text: 'سنة الفجر', options: ['ركعتين', 'لم أصلها'] },
        { id: 'm7', text: 'سنة الظهر القبلية', options: ['4 ركعات', 'ركعتين', 'لم أصلها'] },
        { id: 'm8', text: 'سنة الظهر البعدية', options: ['4 ركعات', 'ركعتين', 'لم أصلها'] },
        { id: 'm9', text: 'سنة العصر', options: ['4 ركعات', 'ركعتين', 'لم أصلها'] },
        { id: 'm10', text: 'سنة المغرب', options: ['ركعتين', 'لم أصلها'] },
        { id: 'm11', text: 'سنة العشاء', options: ['ركعتين', 'لم أصلها'] },

        { id: 'm12', text: 'الضحى', options: ['6 ركعات أو أكثر', '4 ركعات', 'ركعتين', 'لم أصلها'] },
        { id: 'm13', text: 'الأوابين', options: ['6 ركعات أو أكثر', '4 ركعات', 'ركعتين', 'لم أصلها'] },
        { id: 'm14', text: 'قيام الليل', options: ['6 ركعات أو أكثر', '4 ركعات', 'ركعتين', 'لم أصلها'] },
        { id: 'm15', text: 'الوتر', options: ['3 ركعات', 'ركعة', 'لم أصله'] },

        { id: 'm16', text: 'تلاوة القرآن الكريم', options: ['أكثر من جزء', '10-20 صفحة', '1-10 صفحات', '0'] },
        { id: 'm17', text: 'حفظ القرآن الكريم', options: ['أكثر من 10 صفحات', '5-10 صفحات', '1-5 صفحات', '0'] },

        { id: 'm18', text: 'بر الأم', options: ['10','9','8','7','6','5','4','3','2','1','0'] },
        { id: 'm19', text: 'بر الأب', options: ['10','9','8','7','6','5','4','3','2','1','0'] },

        { id: 'm20', text: 'الورد الصباحي', options: ['تم', '——'] },
        { id: 'm21', text: 'الورد المسائي', options: ['تم', '——'] },

        { id: 'm22', text: 'ساعات الدراسة', options: ['أكثر من 6 ساعات','3-5 ساعات','ساعة-ساعتين','أقل من ساعة','0'] },
        { id: 'm23', text: 'الوقت الضائع', options: ['0','أقل من ساعة','ساعة-ساعتين','3-5 ساعات','أكثر من 6 ساعات'] },

        { id: 'm24', text: 'عمل خير', options: ['تم', '——'] },
        { id: 'm25', text: 'أفراح قلب', options: ['تم', '——'] },
        { id: 'm26', text: 'إحياء السنة الأسبوعية', options: ['تم', '——'] }
    ],

    alternate: [
        { id: 'm1', text: 'استغفار فرض الفجر', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm2', text: 'استغفار فرض الظهر', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm3', text: 'استغفار فرض العصر', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm4', text: 'استغفار فرض المغرب', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm5', text: 'استغفار فرض العشاء', options: ['200-250','150-200','100-150','1-100','0'] },

        { id: 'm6', text: 'الصلاة على النبي لسنة الفجر', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm7', text: 'الصلاة على النبي لسنة الظهر القبلية', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm8', text: 'الصلاة على النبي لسنة الظهر البعدية', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm9', text: 'الصلاة على النبي لسنة العصر', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm10', text: 'الصلاة على النبي لسنة المغرب', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm11', text: 'الصلاة على النبي لسنة العشاء', options: ['200-250','150-200','100-150','1-100','0'] },

        { id: 'm12', text: 'تسبيحات الضحى', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm13', text: 'تسبيحات الأوابين', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm14', text: 'تسبيحات قيام الليل', options: ['200-250','150-200','100-150','1-100','0'] },
        { id: 'm15', text: 'تسبيحات الوتر', options: ['200-250','150-200','100-150','1-100','0'] },

        { id: 'm17', text: 'حفظ الحديث النبوي الشريف', options: ['أكثر من 10 أحاديث','5-10 أحاديث','1-5 أحاديث','0'] },

        { id: 'm18', text: 'بر الأم', options: ['10','9','8','7','6','5','4','3','2','1','0'] },
        { id: 'm19', text: 'بر الأب', options: ['10','9','8','7','6','5','4','3','2','1','0'] },

        { id: 'm20', text: 'الورد الصباحي', options: ['تم', '——'] },
        { id: 'm21', text: 'الورد المسائي', options: ['تم', '——'] },

        { id: 'm22', text: 'ساعات الدراسة', options: ['أكثر من 6 ساعات','3-5 ساعات','ساعة-ساعتين','أقل من ساعة','0'] },
        { id: 'm23', text: 'الوقت الضائع', options: ['0','أقل من ساعة','ساعة-ساعتين','3-5 ساعات','أكثر من 6 ساعات'] },

        { id: 'm24', text: 'عمل خير', options: ['تم', '——'] },
        { id: 'm25', text: 'أفراح قلب', options: ['تم', '——'] },
        { id: 'm26', text: 'إحياء السنة الأسبوعية', options: ['تم', '——'] }
    ],


};
document.addEventListener('DOMContentLoaded', function () {

    let collectedAnswers = {};

    const container = document.getElementById('questionContainer');
    const toggle = document.getElementById('questionToggle');
    const saveBtn = document.getElementById('saveProgramBtn');

    function getActiveSetName() {
        return toggle.checked ? 'alternate' : 'default';
    }

    function renderQuestions() {
        const activeSet = questionSets[getActiveSetName()];
        container.innerHTML = '';

        activeSet.forEach((question, index) => {
            const fieldset = document.createElement('fieldset');
            fieldset.className = 'question-card';

            const legend = document.createElement('legend');
            legend.textContent = `${index + 1}. ${question.text}`;
            fieldset.appendChild(legend);

            const row = document.createElement('div');
            row.className = 'flowers-row';

            question.options.forEach((labelText, i) => {
                const value = (i + 1).toString();

                const input = document.createElement('input');
                input.type = 'radio';
                input.name = question.id;
                input.value = value;
                input.id = `${question.id}_${value}`;

                const label = document.createElement('label');
                label.className = 'flower-label';
                label.setAttribute('for', input.id);

                const img = document.createElement('img');
                img.className = 'flower-img';
                img.src = '/stylingtools/unchecked.svg';

                const caption = document.createElement('div');
                caption.className = 'flower-caption';
                caption.textContent = labelText;

                label.appendChild(img);
                label.appendChild(caption);

                const wrap = document.createElement('div');
                wrap.className = 'flower-wrapper';
                wrap.appendChild(input);
                wrap.appendChild(label);

                row.appendChild(wrap);
            });

            fieldset.appendChild(row);
            container.appendChild(fieldset);
        });

        attachRadioListeners();
    }

    function attachRadioListeners() {
        container.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function () {
                const qid = this.name;
                const index = parseInt(this.value) - 1;

                const activeSet = questionSets[getActiveSetName()];
                const question = activeSet.find(q => q.id === qid);
                const answerText = question.options[index];

                collectedAnswers[qid] = answerText;

                updateFlowersForQuestion(qid);
            });
        });
    }

    function updateFlowersForQuestion(qid) {
        const radios = container.querySelectorAll(`input[name="${qid}"]`);

        radios.forEach(radio => {
            const wrap = radio.closest('.flower-wrapper');
            const img = wrap.querySelector('.flower-img');
            const caption = wrap.querySelector('.flower-caption');

            if (radio.checked) {
                img.src = '/stylingtools/checked.svg';
                caption.style.fontWeight = '800';
                caption.style.opacity = '1';
            } else {
                img.src = '/stylingtools/unchecked.svg';
                caption.style.fontWeight = '600';
                caption.style.opacity = '0.7';
            }
        });
    }

    // ⭐ أهم سطرين
    toggle.addEventListener('change', renderQuestions);

    // ⭐ أول تحميل
    toggle.checked = false;
// ⭐ بعد ما تنرسم الأسئلة
renderQuestions();

// ⭐ هلق منجيب إجابات اليوم
fetch(getTodayAnswersUrl)
    .then(res => res.json())
    .then(saved => {
        for (let qid in saved) {
            const answerText = saved[qid];

            // منلاقي السؤال
            const activeSet = questionSets[getActiveSetName()];
            const question = activeSet.find(q => q.id === qid);

            if (!question) continue;

            // منلاقي رقم الخيار
            const index = question.options.indexOf(answerText);
            if (index === -1) continue;

            const value = (index + 1).toString();
            const radio = document.getElementById(`${qid}_${value}`);

            if (radio) {
                radio.checked = true;
                collectedAnswers[qid] = answerText;
            }
        }

        // تحديث شكل الزهرات
        for (let qid in saved) {
            updateFlowersForQuestion(qid);
        }
    });

    // ⭐ زر السيف
    saveBtn.addEventListener('click', function () {

        const payload = {
            setName: getActiveSetName(),
            answers: collectedAnswers
        };

        fetch('/student/daily-program/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            alert("تم الحفظ بنجاح");
        })
        .catch(err => {
            console.error("ERROR:", err);
            alert("الخطأ الحقيقي موجود بالـ Console");
        });

    });

});
