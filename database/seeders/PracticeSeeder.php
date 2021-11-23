<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Database\Seeder;
use App\Models\PublicationState;

class PracticeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Real practices
        foreach (
            [
                "YAGNI : \"You Aint Gonna Need It\". N'écrivez pas de code dont vous pensez avoir besoin dans le futur, mais dont vous n'avez pas encore besoin. Il s'agit de coder pour des cas d'utilisation futurs imaginaires, et inévitablement le code deviendra du code mort ou devra être réécrit parce que le cas d'utilisation futur s'avère toujours fonctionner légèrement différemment de la façon dont vous l'avez imaginé.",
                "Les tests n'ont pas besoin d'être testés. L'infrastructure, les frameworks et les bibliothèques pour les tests ont besoin de tests. Ne testez pas le navigateur ou les bibliothèques externes, sauf si vous en avez vraiment besoin. Testez le code que vous écrivez, pas celui des autres.",
                "La troisième fois que vous écrivez le même morceau de code est le bon moment pour l'extraire dans une aide générale (et écrire des tests pour elle). Les fonctions d'aide à l'intérieur d'un test n'ont pas besoin d'être testées ; lorsque vous les décomposez et les réutilisez, elles ont besoin de tests. La troisième fois que vous écrivez un code similaire, vous avez généralement une idée claire de la forme du problème général que vous résolvez.",
                "Lorsqu'il s'agit de la conception d'une API (interface externe et API objet) : Les choses simples doivent être simples ; les choses complexes doivent être possibles. Concevez d'abord pour le cas le plus simple, avec de préférence une configuration ou un paramétrage nul, si c'est possible. Ajoutez des options ou des méthodes API supplémentaires pour les cas d'utilisation plus complexes et plus flexibles (selon les besoins).",
                "Échec rapide. Vérifiez l'entrée et échouez en cas d'entrée absurde ou d'état invalide le plus tôt possible, de préférence avec une exception ou une réponse d'erreur qui rendra le problème exact clair pour votre appelant. Permettez cependant des utilisations \"innovantes\" de votre code (par exemple, ne faites pas de vérification de type pour la validation des entrées à moins que vous n'en ayez vraiment besoin).",
                "Les tests unitaires testent l'unité de comportement, pas l'unité d'implémentation. Changer l'implémentation, sans changer le comportement ou avoir à changer l'un de vos tests est le but, bien que cela ne soit pas toujours possible. Ainsi, dans la mesure du possible, traitez vos objets de test comme des boîtes noires, en testant à travers l'API publique sans appeler les méthodes privées ni manipuler l'état.",
                "Pour les tests unitaires (y compris les tests d'infrastructure), tous les chemins de code doivent être testés. Une couverture à 100 % est un bon point de départ. Il n'est pas possible de couvrir toutes les permutations/combinaisons d'états possibles (explosion combinatoire), il faut donc y réfléchir. Ce n'est que s'il y a une très bonne raison que les chemins de code ne doivent pas être testés. Le manque de temps n'est pas une bonne raison et finit par coûter plus de temps. Parmi les bonnes raisons possibles, on peut citer : l'impossibilité de tester le code (d'une manière significative), l'impossibilité de l'atteindre en pratique ou le fait qu'il soit couvert par un autre test. Le code sans tests est un handicap. Mesurer la couverture et rejeter les RPs qui réduisent le pourcentage de couverture est une façon de s'assurer que vous progressez progressivement dans la bonne direction.",
                "Le code est l'ennemi : il peut se tromper, et il a besoin de maintenance. Écrivez moins de code. Supprimez du code. N'écrivez pas de code dont vous n'avez pas besoin.",
                "Inévitablement, les commentaires de code deviennent des mensonges avec le temps. En pratique, peu de gens mettent à jour les commentaires lorsque les choses changent. Efforcez-vous de rendre votre code lisible et auto-documenté par de bonnes pratiques de nommage et un style de programmation connu.",
                "Écrivez de manière défensive. Pensez toujours à ce qui peut mal tourner, à ce qui se passera en cas d'entrée invalide et à ce qui pourrait échouer, ce qui vous aidera à attraper de nombreux bogues avant qu'ils ne se produisent.",
                "La logique est facile à tester en unité si elle est sans état et sans effet secondaire. Décomposez la logique en fonctions distinctes, plutôt que de la mélanger à du code sans état et rempli d'effets secondaires. La séparation du code avec état et du code avec effets secondaires en fonctions plus petites les rend plus faciles à simuler et à tester sans effets secondaires. (Moins de frais généraux pour les tests signifie des tests plus rapides.) Les effets secondaires doivent être testés, mais les tester une fois et les simuler partout ailleurs est généralement un bon modèle.",
                "Les globaux sont mauvais. Les fonctions sont meilleures que les types. Les objets sont probablement meilleurs que les structures de données complexes.",
                "L'utilisation des types intégrés de Python - et de leurs méthodes - sera plus rapide que l'écriture de vos propres types (sauf si vous écrivez en C). Si les performances sont un facteur important, essayez de trouver un moyen d'utiliser les types intégrés standard plutôt que des objets personnalisés.",
                "L'injection de dépendances est un modèle de codage utile pour être clair sur ce que sont vos dépendances et d'où elles viennent. (Faites en sorte que les objets, les méthodes, etc. reçoivent leurs dépendances en tant que paramètres plutôt que d'instancier eux-mêmes de nouveaux objets). Cela rend les signatures d'API plus complexes, c'est donc un compromis. Si vous vous retrouvez avec une méthode qui nécessite 10 paramètres pour toutes ses dépendances, c'est un bon signe que votre code en fait trop, de toute façon. L'article définitif sur l'injection de dépendances est \"Inversion of Control Containers and the Dependency Injection Pattern\", par Martin Fowler.",
                "Plus vous devez faire des simulations pour tester votre code, plus votre code est mauvais. Plus vous devez instancier et mettre en place du code pour pouvoir tester un comportement spécifique, plus votre code est mauvais. L'objectif est de créer de petites unités testables, ainsi que des tests d'intégration et fonctionnels de plus haut niveau pour vérifier que les unités coopèrent correctement.",
                "Les API externes sont celles pour lesquelles la \" conception en amont \" - et la prise en compte des cas d'utilisation futurs - est vraiment importante. Changer d'API est pénible pour nous et pour nos utilisateurs, et créer une incompatibilité rétroactive est horrible (bien que parfois impossible à éviter). Concevez les API externes avec soin, tout en respectant le principe \" les choses simples doivent rester simples \".",
                "Si une fonction ou une méthode dépasse 30 lignes de code, envisagez de la décomposer. Une bonne taille maximale de module est d'environ 500 lignes. Les fichiers de test ont tendance à être plus longs que cela.",
                "Ne faites pas de travail dans les constructeurs d'objets, qui sont difficiles à tester et surprenants. Ne mettez pas de code dans __init__.py (sauf les importations pour l'espacement des noms). __init__.py n'est pas l'endroit où les programmeurs s'attendent généralement à trouver du code, donc c'est \"surprenant\".",
                "DRY (Don't Repeat Yourself) importe beaucoup moins dans les tests que dans le code de production. La lisibilité d'un fichier de test individuel est plus importante que la maintenabilité (décomposer des morceaux réutilisables). Cela s'explique par le fait que les tests sont exécutés et lus individuellement plutôt que de faire partie d'un système plus vaste. Évidemment, une répétition excessive signifie que des composants réutilisables peuvent être créés pour des raisons de commodité, mais c'est beaucoup moins une préoccupation que pour la production.",
                "Refactorisez chaque fois que vous en voyez le besoin et que vous en avez l'occasion. La programmation est une question d'abstractions, et plus vos abstractions sont proches du domaine du problème, plus votre code est facile à comprendre et à maintenir. Au fur et à mesure que les systèmes se développent organiquement, ils doivent changer de structure pour s'adapter à l'expansion de leurs cas d'utilisation. Les systèmes dépassent leurs abstractions et leur structure, et ne pas les changer devient une dette technique qui est plus pénible (et plus lente et plus boguée) à gérer. Incluez le coût de l'élimination de la dette technique (remaniement) dans les estimations du travail sur les fonctionnalités. Plus vous laissez la dette en place, plus les intérêts s'accumulent. Un excellent livre sur le remaniement et les tests est Working Effectively with Legacy Code, de Michael Feathers.",
                "Faites en sorte que le code soit d'abord correct et ensuite rapide. Lorsque vous travaillez sur des problèmes de performance, établissez toujours un profil avant d'apporter des corrections. En général, le goulot d'étranglement n'est pas tout à fait là où vous pensiez qu'il était. Écrire du code obscur parce qu'il est plus rapide ne vaut la peine que si vous l'avez profilé et prouvé que cela en vaut vraiment la peine. Écrire un test qui exerce le code que vous profilez avec un timing autour de lui permet de savoir plus facilement quand vous avez fini, et peut être laissé dans la suite de tests pour prévenir les régressions de performance. (Avec la remarque habituelle que l'ajout de code de chronométrage change toujours les caractéristiques de performance du code, ce qui fait du travail de performance l'une des tâches les plus frustrantes).",
            ]
            as $practice
        ) {
            Practice::create(
                [
                    'description' => $practice,
                    'domain_id' => Domain::all()->random()->id,
                    'publication_state_id' => PublicationState::all()->random()->id,
                    'user_id' => User::all()->random()->id,
                    'updated_at' => Carbon::now()->subMinutes(rand(1, 5 * 24 * 60)),
                ]
            );
        }

        // and a few fake ones
        Practice::factory(10)->create();
    }
}
