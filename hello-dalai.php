<?php
/*
Plugin Name: Hello Dalai Lama
Plugin URI: http://github.com/jeckman/hello-dalai
Description: Based on a joke made on WP Late Night. Fork of Hello Dolly (http://wordpress.org/extend/plugins/hello-dolly/ ), but 
with quotes from the Dalai Lama. 
Author: John Eckman
Version: 1.0.1
Author URI: http://www.openparenthesis.org/
*/

function hello_dalai_get_quotes() {
	/** Dalai Lama quotes, one per line */
	/* quotes from http://drawohara.com/post/53796569/dalai-lama-quotes */
	$hello_dalai_quotes = "We can deny everything, except that we have the possibility of being better.  Simply reflect on that.
The very purpose of religion is to control yourself, not to criticize others.  Rather, we must criticize ourselves.
Sleep is the best meditation.
My religion is very simple.  My religion is kindness.
In the practice of tolerance, one&apos;s enemy is the best teacher.
Happiness is not something ready-made.  It comes from your own actions.
The main cause of suffering is egoistic desire for one&apos;s own comfort and happiness.
When you lose, don&apos;t lose the lesson.
We can live without religion and meditation, but we cannot survive without human affection.
Learn the rules so you know how to break them properly.
Don&apos;t let a little dispute injure a great friendship.
Remember that silence is sometimes the best answer.
Share your knowledge.  It&apos;s a way to achieve immortality.
Judge your success by what you had to give up in order to get it.
Where ignorance is our master, there is no possibility of real peace.
When you realize you&apos;ve made a mistake, take immediate steps to correct it.
Try not even to think of yourself as better than the humblest beggar.  You will look the same in your grave.
Knowledge is important, but much more important is the use toward which it is put.  This depends on the heart and mind of the one who uses it.
Wherever you are, your religious teaching must be there with you.
If you had to analyze all your dreams there would be no time left to dream.
Be kind whenever possible . . . It is always possible.
It is not enough to be compassionate.  You must act.
Love and compassion are necessities, not luxuries.  Without them humanity cannot survive.
Anger is the ultimate troublemaker.
The purpose of our lives is to be happy.
If you have a particular faith or religion, that is good - but you can survive without it.
Some people, sweet and attractive, and strong and healthy, happen to die young.  They are masters in disguise teaching us about impermanence.
We can never obtain peace in the outer world until we make peace with ourselves.
Suffering increases your inner strength.  Also, the wishing for suffering makes the suffering disappear.
On a daily basis, you must take more care of your mind than just money, money, money!
World peace through hatred and force is impossible.
To foster inner awareness, introspection, and reasoning is more efficient than meditation and prayer.
The training of the mind is an art.  If this can be considered as art, one&apos;s life is art.
The ultimate authority must always rest with the individual&apos;s own reason and critical analysis.
What science finds to be nonexistent, we must accept as nonexistent; but what science merely does not find is a completely different matter . . . It is quite clear that there are many, many mysterious things.";

	// Here we split it into lines
	$hello_dalai_quotes = explode( "\n", $hello_dalai_quotes );

	// And then randomly choose a line
	return wptexturize( $hello_dalai_quotes[ mt_rand( 0, count( $hello_dalai_quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dalai() {
	$chosen = hello_dalai_get_quotes();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dalai' );

// We need some CSS to position the paragraph
function dalai_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dalai {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dalai_css' );

?>